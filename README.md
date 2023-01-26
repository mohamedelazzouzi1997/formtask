# Referral Task Project

this project is about user using referral link and submite some data. and desplaying this data in the admin side with charts and filters
# Visuals
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/dashboard.png?raw=true)
# Installation

### 1. Clone GitHub repo for this project locally

```bash
  git clone https://github.com/mohamedelazzouzi1997/formtask
```

### 2. cd into your project

```bash
  cd formtask
```
### 3. Install Composer Dependencies

```bash
  composer install
```
### 4. Create a copy of your .env file

```bash
  cp .env.example .env
```
### 5. Generate an app encryption keye

```bash
  php artisan key:generate
```

### 6. Create an empty database for our application
  Create an empty database for your project.In our example we created a database called “ecdtest”

### 7. In the .env file, add database information to allow Laravel to connect to the database
  In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
### 8. Migrate the database

```bash
  php artisan migrate
```
### 8. Seed fake data for testing

```bash
  php artisan db:seed
```
# Packages and libraries used in the project
### 1. login and registration
for the admin login and registration i used [Laravel Fortify](https://laravel.com/docs/9.x/fortify).
Laravel Fortify is a frontend agnostic authentication backend implementation for Laravel. Fortify registers the routes and controllers needed to implement all of Laravel's authentication features, including login, registration, password reset, email verification, and more. 
### 2. Charts
for the charts i user a laravel Package Called [Laravel Charts](https://charts.erik.cat/).  
Laravel Charts is a charting library for laravel  Supported  multiple javascript libraries like [ChartsJs, Highcharts, Fusioncharts...]

### 3. Mail trap
[Mail trap](https://mailtrap.io) for testing mail services .  

### 4. Laravel excel
[Laravel excel](https://laravel-excel.com/) for Importing data from an excel file to database . 

# Project Usage and How it work

### Links Page
  
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/page1.png?raw=true)

in this page we have three links with referral [twitter , facebook , instagram] heading to the form page  
with Query parameters [referral as key] and [social media name as value]  
Url Example: [http://myproject.test/form?referral=Fabebook]
```bash
<div class="container">
    <div class="row mx-auto my-5 justify-content-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn btn-primary " href="{{ url('/form?referral=Fabebook') }}">Fabebook</a>
                <a class="btn btn-danger" href="{{ url('/form?referral=Instagrame') }}">Instagrame</a>
                <a class="btn btn-warning" href="{{ url('/form?referral=Twitter') }}">Twitter</a>
        </div>
    </div>
</div>
```
### Form Page
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/formpage.png?raw=true)



in this page we have a links for admin login / registration page and referral links page.  
and we have a form for submiting some data and an input file to submit data from an excel file.

#### Form Validation
for validation we using a laravel function called [Validate](https://laravel.com/docs/9.x/fortify)  
```bash
        $all = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required',
            'phone' => 'numeric|required',
            'country' => 'required',
            'city' => 'required',
            'referal' => 'required',
        ]);
```
for displaying validation errors Laravel provide An $errors variable is shared with all of your application's views by.
```bash
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/formvalidation.png?raw=true)

then if the validation passed successfully we store data in database for  that we use methode called [Create](https://laravel.com/docs/9.x/eloquent-relationships#the-create-method)
```bash
    $form = Form::Create($all);
```
we store the return value from create method into a variable to check if the data stored successfully

```bash
    if($form){
        session()->flash('status','form submited successfully');
        return back();
    }else{
        session()->flash('status','something went wrong');
        return back();
    }
```
then displaying the status message stored in the browser session
```bash
    @if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
    @endif
```
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/formsuccess.png?raw=true)
#### Form file 
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/formfile.PNG?raw=true)
to store data from excel file we using [Laravel excel](https://laravel-excel.com/) package.  
first step we need to create an import class with model that you want to store data for.  
```bash
php artisan make:import FormImport --model=Form
```
then in app/Imports you will find the file created
```bash
<?php

namespace App\Imports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormImport implements ToModel,WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $form = new Form([
            'firstName' => $row['firstname'],
            'lastName' => $row['lastname'],
            'email' => $row['email'],
            'dateOfBirth' => $row['dateofbirth'],
            'phone' => $row['phone'],
            'country' => $row['country'],
            'city' => $row['city'],
            'referal' => $row['referal'],
            'is_confirmed' => 0,
            'sales' => $row['sales'],
            'created_at' => $row['created_at']
        ]);
        if($form)
            return $form;

        return back()->with([
            'status' => 'something went wrong'
        ]);
    }


}
```
then we add WithHeadingRow concern to use names as array key to store data.  
and in the controller of this route we call import methode.
```bash
    public function storeFromCsvFille(Request $request){

        $request->validate([
            'file_data' => 'required'
        ]);

        $check = Excel::import(new FormImport, $request->file_data);

        session()->flash('status','data submited successfully from the file => '.$request->file_data->getClientOriginalName());
        return back();
    }
```

### admin dashboard
in the admin dashboard we display all the submitted data with 2 charts and simple table

for admine dashboard we using group of routes with [ Middleware](https://laravel.com/docs/9.x/middleware#main-content).  
Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to your application's login screen.
```bash
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [adminController::class,'index'])->name('home');
    Route::get('/home/filter',[adminController::class,'index'])->name('filter');


    Route::post('/home/form/reject/{id}',[adminController::class,'rejectForm'])->name('form.reject');
    Route::post('/home/form/accept/{id}',[adminController::class,'acceptForm'])->name('form.accept');
    Route::get('/home/form/delete/{id}',[adminController::class,'deleteForm'])->name('form.delete');

});
```
![alt text](https://github.com/mohamedelazzouzi1997/formtask/blob/main/public/images/dashboard.png?raw=true)

#### First Chart 
this chart display count of submited form per day.  
for fetching this data from the database we use [laravel eloquent](https://laravel.com/docs/9.x/eloquent), Laravel Eloquent, an object-relational mapper (ORM) that makes it enjoyable to interact with your database.
```bash
$chartData = Form::selectRaw('DATE(created_at) as created, COUNT(*) as created_count') // chart data
        ->groupBy('created')
        ->where('created_at', '>', Carbon::now()->subYear())
        ->get();
```
#### second Chart 
this chart display count of Referral by social media.
```bash
$chartReferal=  Form::select('referal')
        ->selectRaw('count(referal) as counts')
        ->where('created_at', '>', Carbon::now()->subYear())
        ->groupBy('referal')
        ->get();
```
#### third Chart 
this chart display count of sales by Origins.
```bash
$chartReferal=  Form::select('referal')
$File_Data_Chart=  Form::selectRaw('sum(sales) as sales_Count,referal as origin')
        ->whereDate('created_at', '>=', $Filter_Date_From)
        ->whereDate('created_at', '<=', $Filter_Date_To)
        ->groupBy('referal')
        ->get();
```
#### Chart form Filter
on top of the first chart we have a form to filter chart data between two date  
 ```bash

//checking if the filter form is submited
if($request->has('date_start') || $request->has('date_end')){

    $Filter_Date_From = $request->date_start ?? Carbon::now();
    $Filter_Date_To = $request->date_end ?? Carbon::now();

    //select colume created_at between two date from the form table
    $chartData = Form::selectRaw('DATE(created_at) as created, COUNT(*) as created_count') // chart data
            ->groupBy('created')
            ->whereDate('created_at', '>=', $Filter_Date_From)
            ->whereDate('created_at', '<=', $Filter_Date_To)
            ->get();

    //select colume referal between two date from the form table
    $chartReferal=  Form::select('referal')
            ->selectRaw('count(referal) as counts')
            ->whereDate('created_at', '>=', $Filter_Date_From)
            ->whereDate('created_at', '<=', $Filter_Date_To)
            ->groupBy('referal')
            ->get();

}
```
for that we check if the filter form was submitted then we store filter form data in two variable  
[$Filter_Date_From,  $Filter_Date_To] and we use the [laravel Query Builder whereDate](https://laravel.com/docs/9.x/queries#where-clauses) to filter data between two different date for both charts



#### Simple data table 
for this table we use basic Query builder to fetch latest submited forms and paginate them with [laravel Paginating Query Builder](https://laravel.com/docs/9.x/pagination#paginating-query-builder-results)
  ```bash
     $Form_Data = Form::latest()->paginate(5); //table data
```
and in the blade to display pagination we need to add
  ```bash
     {{ $Form_Data->links() }}
```
in the table we have a colume called action containe three buttons [Accept, Reject, Delete] with thee function for manage the submitted forms.

#### function Accept
for this function when admin click on the button [accept] a url with id of the form as parameter will be triggered 
  ```bash
    <form class="d-inline" action="{{ route('form.accept',$data->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success">Accept <i class="fa-solid fa-check"></i></button>
    </form>
```
for the route in the web.php
  ```bash
    Route::post('/home/form/accept/{id}',[adminController::class,'acceptForm'])->name('form.accept');
```

this route call a function in the adminController called [acceptForm]
  ```bash
    public function acceptForm($id){

        $form = Form::find($id);
        $form->update([
           'is_confirmed' => 1
        ]);

        if($form){
            Mail::to($form->email)->send(new FormMail('Rejected'));
            session()->flash('status','the form was accepted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }
```
then we select the raw from the form table in database with primary key [id].  
now we can update the colume [is_confirmed]
  ```bash
      $form->update([
         'is_confirmed' => 1
      ]);
```
then we check if the update passed successfully by cheking the return of the method update
  ```bash
      if($form){
          Mail::to($form->email)->send(new FormMail('accepted'));
          session()->flash('status','the form was accepted successfully');
          return back();
      }
          session()->flash('status','something went wrong');
          return back();
```
then we send an email to the address email of this selected form with message (Accepted)

  ```bash
        Mail::to($form->email)->send(new FormMail('accepted'));
```

we create a session message called [status] to display it in the view the update passed successfully and return to the previous route with the function [back()]
  ```bash
        session()->flash('status','the form was accepted successfully');
        return back();
```
#### function Reject
this function like the accepte function we just updating [is_confirmed] colume to 0.  
and we send mail with message (Rejected)
  ```bash
    //function for reject a form
    public function rejectForm($id){

        $form = Form::find($id);
        $form->update([
            'is_confirmed' => 0
        ]);

        if($form){
            Mail::to($form->email)->send(new FormMail('Rejected'));
            session()->flash('status','the form was rejected successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }
```

#### delete function
same as the Accept and reject methods we select the raw by primery key[id] from the form table and we use a laravel function called [delete()](https://laravel.com/docs/9.x/queries#delete-statements) to hard delete this raw from the table and check if the return of this methode containe true to confirme the delete was passed successfully and we retrun back to the previous route with session message

  ```bash
    // hard delete a form
    public function deleteForm($id){
        //Select raw from form table by id and hard delete it
        $form = Form::find($id)->delete();
        if($form){
            session()->flash('status','the form was deleted successfully');
            return back();
        }
            session()->flash('status','something went wrong');
            return back();
    }
```
