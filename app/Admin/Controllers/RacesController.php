<?php

namespace App\Admin\Controllers;

use App\Race;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RacesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Race);

        $grid->name('名称');
        $grid->rarity('稀有度');
        $grid->type_one('属性')->display(function ($type) {
            return isset($type)?config("system.type.$type"):"无";
        });
        $grid->type_two('第二属性')->display(function ($type) {
            return isset($type)?config("system.type.$type"):"无";
        });



        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Race::findOrFail($id));

        $show->name('名称');
        $show->image('形象')->image();
        $show->rarity('稀有度');
        $show->type_one('属性')->as(function ($type) {
            return isset($type)?config("system.type.$type"):"无";
        });
        $show->type_two('第二属性')->as(function ($type) {
            return isset($type)?config("system.type.$type"):"无";
        });
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Race);
        $form->text('name', '名称')->required();
        $form->image('image', '形象');
        $form->number('rarity', '稀有度')->required()->value(0);
        $form->select('type_one' ,'属性')->required()->options(config('system.type'));
        $form->select('type_two' ,'第二属性')->options(config('system.type'));
        $form->hasMany('evolves','进化', function (Form\NestedForm $form) {
            $races = Race::get();
            $arr = [];
            foreach ($races as $race){
                $arr += $race->id_name;
            }
            $form->select('after' ,'进化')->required()->options($arr);

            $form->select('type', '进化类型')->required()->options(['升级进化','道具进化']);

            $form->text('mode', '进化方式')->required()->help('升级进化则输入等级，道具进化则输入道具效果号');
        });

        return $form;
    }
}
