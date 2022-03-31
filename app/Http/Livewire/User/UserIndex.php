<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Rap2hpoutre\FastExcel\FastExcel;

class UserIndex extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;
    public User $user;

    public function mount(User $user) {
        $this->user = $user;
    }

    public function render()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('livewire.user.user-index', [
            'users' => $users
        ]);
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ];
    }

    //custom validation message
    protected $messages = [
        'name.required' => 'ชื่อสกุลห้ามว่าง',
        'email.required' => 'อีเมล์ห้ามว่าง',
        'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
        'email.unique' => 'มีผู้ใช้งานอีเมล์นี้แล้ว กรุณาลองใหม่',
        'password.required' => 'รหัสผ่านห้ามว่าง',
    ];

    //Realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store() {

        $this->validate();

        try {
            $this->user::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $this->resetForm();

            session()->flash('message', 'เพิ่มข้อมูลสำเร็จ');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('message', 'เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
        }
    }

    public function resetForm() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function exportExcel() {
        $users = User::all();
        (new FastExcel($users))->export( uniqid().'.xlsx');
        session()->flash('message', 'ส่งออก Excel สำเร็จ');
    }

    public function importExcel() {}

}
