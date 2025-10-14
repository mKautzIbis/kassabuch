<?php

namespace App\Livewire;

use App\Models\Category;
use Flux\Flux;
use Livewire\Component;

class CategoryManagment extends Component
{
    public $name;
    public $color;
    public $selected_for_delete;
    public $marked_for_edit;
    public $edit_name;
    public $edit_color;

    public function mount()
    {
        $this->marked_for_edit = '';
        $this->edit_name='';
        $this->edit_color='';
    }

    public function addCategory()
    {
        $this->validate([
           'name' => 'required|min:3|unique:categories',
           'color' => 'required'
        ]);
        $count=Category::count();
        if($count<8){
            Category::create([
                'name' => $this->name,
                'color' => $this->color,
            ]);
            $this->name = '';
            $this->color = '';
        }else{
            $this->addError('max_categories', 'Maximum number of categories reached');
        }
    }

    public function edit($id)
    {
        $this->marked_for_edit = $id;
        $category = Category::find($id);
        $this->edit_name = $category->name;
        $this->edit_color = $category->color;
    }

    public function close_edit()
    {
        $this->reset();
    }

    public function save_edit()
    {
        $this->validate([
            'edit_name' => 'required|min:3',
            'edit_color' => 'required'
        ]);
        $category=Category::find($this->marked_for_edit);
        if($category->name != $this->edit_name){
            $this->validate([
                'edit_name' => 'unique:categories,name',
            ]);
        }
        $category->name = $this->edit_name;
        $category->color = $this->edit_color;
        $category->save();
        $this->reset();
    }



    public function deleteQuestion($id)
    {
        Flux::modal('deleteModal')->show();
        $this->selected_for_delete=$id;
    }
    public function delete()
    {
        Flux::modal('deleteModal')->close();
        if(Category::find($this->selected_for_delete)!=null)
            Category::destroy($this->selected_for_delete);
    }


    public function render()
    {
        $categories = Category::orderBy('name')->get();
        return view('livewire.category-managment', ['categories' => $categories]);
    }
}
