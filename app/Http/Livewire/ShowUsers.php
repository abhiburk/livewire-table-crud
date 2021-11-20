<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Jobs\SendUserSuspensionMail;

class ShowUsers extends Component
{
    use WithPagination;

    public $name, $email, $phone_number, $status = 'all';
    public $selected_users = [];
    public $all_users_selected = false;
    public $all_status = ['active','in active','block','suspended'];

    public function render(){
        
        
        return view('livewire.show-users',[
            'users' => $this->users,
        ]);
    }

    public function paginationView(){
        return 'components.pagination-view';
    }

    public function search(){
        $this->resetPage();
        $this->render();
        $this->selected_users = [];
    }

    public function getUsersProperty() {
        $name = $this->name;
        $email = $this->email;
        $phone_number = $this->phone_number;
        $status = $this->status;

        $query = User::where(function($query) use ($name){
            $query->where('name','LIKE','%'.$name.'%')->orWhere('company_name','LIKE','%'.$name.'%');
        })->where('email','LIKE','%'.$email.'%')->where('phone_number','LIKE','%'.$phone_number.'%');
        
        if($status != 'all'){
            $query = $query->where('status',$status);
        }
        $query = $query->paginate(10)->onEachSide(1);
        
        return $query;
    }

    public function statusUpdate($id, $status){
        User::find($id)->update(['status' => $status]);
        if($status == 'suspended'){
            SendUserSuspensionMail::dispatch($id);
        }
        $this->render();
    }

    public function bulkStatusUpdate($status){
        User::whereIn('id',$this->selected_users)->update(['status' => $status]);
        $this->render();
        if($status == 'suspended'){
            foreach($this->selected_users as $user_id){
                SendUserSuspensionMail::dispatch($user_id);
            }
        }
        $this->selected_users = [];
    }

    public function delete($id){
        User::find($id)->delete();
        $this->render();
    }

    public function bulkDelete(){
        User::whereIn('id',$this->selected_users)->delete();
        $this->render();
        $this->reset(['selected_users', 'all_users_selected']);
    }

    public function updatedAllUsersSelected($value){
        if($value){
            $this->selected_users = $this->users->pluck('id')->map(function($id){
                return (string) $id;
            });
        }else{
            $this->reset(['selected_users', 'all_users_selected']);
        }
    }

    public function updatedSelectedUsers($value){
        if(count($this->selected_users) == $this->users->count())
            $this->all_users_selected = true;
        else 
            $this->all_users_selected = false;
    }

}
