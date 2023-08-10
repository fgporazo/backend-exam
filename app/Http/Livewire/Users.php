<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;
use DB;

class Users extends Component
{

    public $username,$first_name, $middle_name, $last_name, $email, $password, $user_id;
    protected $listeners = [
        'deleteData'
    ];

    public function render()
    {
        $users = User::orderBy('first_name','asc')
                        ->orderBy('last_name','asc')
                            ->paginate(10);

        return view('livewire.users.index',['users' => $users]);
    }

    public function updateDetails($id){
        $userDetails = User::findOrFail($id);

        $this->username = $userDetails->username;
        $this->first_name = $userDetails->first_name;
        $this->middle_name = $userDetails->middle_name;
        $this->last_name = $userDetails->last_name;
        $this->email = $userDetails->email;
        $this->password = $userDetails->password;
        $this->user_id = $userDetails->id;

        $this->emit('updateDetails');
    }

    public function mount()
    {
        $this->fill([
            'username' => $this->username,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password
            
        ]);
    }

    public function resetInputFields(){
        $users = User::orderBy('first_name','asc')
                        ->orderBy('last_name','asc')
                        ->paginate(10);
    }

    public function store(){
        DB::beginTransaction();
       
        $validated = $this->validate([
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => [
                'required',
                'string',
                'min:6',              // must be at least 6 characters in length
            ]
            
            
        ],
        [
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username must be unique.',
            
            'first_name.required' => 'The first name field is required.',
            'middle_name.required' => 'The middle name field is required.',

            'email.required' => 'The email field is required.',
            'email.unique' => 'The email must be unique.',

            'password.unique' => 'The password field is required.',
        
            
        ]);
       
        try{
          
            $users = User::create([
                'username' =>  $validated['username'],
                'first_name' =>  $validated['first_name'],
                'middle_name' =>  $validated['middle_name'],
                'last_name' =>  $validated['last_name'],
                'email' =>  $validated['email'],
                'password' =>    Hash::make($validated['password'])

            ]);

            $this->resetInputFields();
            flashMessage('User created successfully.');

        DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            flashMessage($e->getMessage(),false);
        }
        
    }

    public function update(){
        DB::beginTransaction();
       
        $validated = $this->validate([
            'username' => 'required|unique:users,username,'.$this->user_id,
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,'.$this->user_id
        ],
        [
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username must be unique.',
            
            'first_name.required' => 'The first name field is required.',
            'middle_name.required' => 'The middle name field is required.',

            'email.required' => 'The email field is required.',
            'email.unique' => 'The email must be unique.',
        ]);
       
        try{
          
            $users = User::find($this->user_id)->update([
                'username' =>  $validated['username'],
                'first_name' =>  $validated['first_name'],
                'middle_name' =>  $validated['middle_name'],
                'last_name' =>  $validated['last_name'],
                'email' =>  $validated['email']

            ]);

            $this->resetInputFields();
            flashMessage('User updated successfully.');

        DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            flashMessage($e->getMessage(),false);
        }
        
    }

    public function deleteData($id){
        $data = User::find($id);
        if($data){
            $data->delete();
        }
        flashMessage('User deleted successfully.');
        $this->resetInputFields();
    }
}
