<?php

namespace App\Admin\Controllers;

use App\Models\Vacancy;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VacancyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vacancy';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vacancy());

        $grid->column('id', __('Id'));
        $grid->column('department_name', __('Department name'));
        $grid->column('title', __('Title'));
        $grid->column('qualification', __('Qualification'));
        $grid->column('age_limit', __('Age limit'));
        // $grid->column('last_date', __('Last date'));
        // $grid->column('details_link', __('Details link'));
        // $grid->column('online_link', __('Online link'));
        $grid->column('active', __('Active'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Vacancy::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('department_name', __('Department name'));
        $show->field('title', __('Title'));
        $show->field('qualification', __('Qualification'));
        $show->field('age_limit', __('Age limit'));
        $show->field('last_date', __('Last date'));
        $show->field('details_link', __('Details link'))->link();
        $show->field('online_link', __('Online link'))->link();
        $show->field('pdf', __('Online link'))->file();
        $show->field('active', __('Active'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Vacancy());

        $form->text('department_name', __('Department name'))->rules('required');
        $form->text('title', __('Title'))->rules('required');
        $form->text('qualification', __('Qualification'))->rules('required');
        $form->text('age_limit', __('Age limit'))->rules('required');
        $form->date('last_date', __('Last date'))->rules('required');
        $form->text('details_link', __('Details link'))->rules('required');
        $form->text('online_link', __('Online link'))->rules('required');
        $form->file('pdf', __('PDF'))->rules('mimes:pdf');;
        $form->switch('active', __('Active'))->default(Vacancy::ACTIVE);

        return $form;
    }
}
