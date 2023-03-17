<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\frontend\HomeController as Home;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\TrainingController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ApplicantController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\ConfigurationController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\IndustryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\ChapterController;
use App\Http\Controllers\backend\ChapterContentController;
use App\Http\Controllers\backend\ChapterEvaluationController;
use App\Http\Controllers\backend\ExamController;
use App\Http\Controllers\frontend\CourseController as Course;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\LearnController;
use App\Http\Controllers\frontend\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'admin'],function(){
    Route::get('/', [HomeController::class,'index'])->name('backend.home');
    //Roles
    Route::post('roles/store',[HomeController::class,'store'])->name('roles.store');
    Route::get('roles',[HomeController::class,'index'])->name('roles.index');
    Route::get('roles/create',[HomeController::class,'create'])->name('roles.create');
    Route::put('roles/{role}',[HomeController::class,'update'])->name('roles.update');
    Route::get('roles/{role}',[HomeController::class,'show'])->name('roles.show');
    Route::delete('roles/{role}',[HomeController::class,'destroy'])->name('roles.destroy');
    Route::get('roles/{role}/edit',[HomeController::class,'edit'])->name('roles.edit');
    
    //users

    Route::get('users',[UserController::class,'index'])->name('user.index');
    Route::get('users/create',[UserController::class,'create'])->name('user.create');
    Route::get('users/{user}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::put('users/{user}',[UserController::class,'update'])->name('user.update');
    Route::get('users/{user}',[UserController::class,'show'])->name('user.show');
    Route::delete('users/{user}',[UserController::class,'destroy'])->name('user.destroy');
    

    Route::get('trainings',[TrainingController::class,'index'])->name('training.index');
    Route::post('trainings/store',[TrainingController::class,'store'])->name('training.store');
    Route::get('trainings/create',[TrainingController::class,'create'])->name('training.create');
    Route::get('trainings/{training}/edit',[TrainingController::class,'edit'])->name('training.edit');
    Route::put('trainings/{training}',[TrainingController::class,'update'])->name('training.update');
    Route::get('trainings/{training}',[TrainingController::class,'show'])->name('training.show');
    Route::delete('trainings/{training}',[TrainingController::class,'destroy'])->name('training.destroy');
    

    Route::get('orders',[OrderController::class,'index'])->name('orders.index');
    Route::post('orders/store',[OrderController::class,'store'])->name('orders.store');
    Route::get('orders/create',[OrderController::class,'create'])->name('orders.create');
    Route::get('orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');
    Route::put('orders/{order}',[OrderController::class,'update'])->name('orders.update');
    Route::get('orders/{order}',[OrderController::class,'show'])->name('orders.show');
    Route::delete('orders/{order}',[OrderController::class,'destroy'])->name('orders.destroy');
    Route::get('applicants',[ApplicantController::class,'index'])->name('applicant.index');
    Route::get('applicants/{aplicant}',[ApplicantController::class,'show'])->name('applicant.show');


    Route::get('contacts',[ContactController::class,'index'])->name('contacts.index');
    Route::post('contacts/store',[ContactController::class,'store'])->name('contacts.store');
    Route::get('contacts/create',[ContactController::class,'create'])->name('contacts.create');
    Route::get('contacts/{contact}/edit',[ContactController::class,'edit'])->name('contacts.edit');
    Route::put('contacts/{contact}',[ContactController::class,'update'])->name('contacts.update');
    Route::get('contacts/{contact}',[ContactController::class,'show'])->name('contacts.show');
    Route::delete('contacts/{contact}',[ContactController::class,'destroy'])->name('contacts.destroy');
    
    Route::get('configs',[ConfigurationController::class,'index'])->name('configs.index');
    Route::get('configs/{config}/edit',[ConfigurationController::class,'edit'])->name('configs.edit');
    Route::put('configs/{config}',[ConfigurationController::class,'update'])->name('configs.update');
    
    /**category */

    Route::post('categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::put('categories/{role}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('categories/{role}',[CategoryController::class,'show'])->name('categories.show');
    Route::delete('categories/{role}',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::get('categories/{role}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    
    /**Industry */
    Route::post('industries/store',[IndustryController::class,'store'])->name('industries.store');
    Route::get('industries',[IndustryController::class,'index'])->name('industries.index');
    Route::get('industries/create',[IndustryController::class,'create'])->name('industries.create');
    Route::put('industries/{role}',[IndustryController::class,'update'])->name('industries.update');
    Route::get('industries/{role}',[IndustryController::class,'show'])->name('industries.show');
    Route::delete('industries/{role}',[IndustryController::class,'destroy'])->name('industries.destroy');
    Route::get('industries/{role}/edit',[IndustryController::class,'edit'])->name('industries.edit');
    
    /**Post */

    Route::post('posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('posts',[PostController::class,'index'])->name('posts.index');
    Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
    Route::put('posts/{role}',[PostController::class,'update'])->name('posts.update');
    Route::get('posts/{role}',[PostController::class,'show'])->name('posts.show');
    Route::delete('posts/{role}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('posts/{role}/edit',[PostController::class,'edit'])->name('posts.edit');
    

    /***Course */

    Route::post('courses/store',[CourseController::class,'store'])->name('courses.store');
    Route::get('courses',[CourseController::class,'index'])->name('courses.index');
    Route::get('courses/create',[CourseController::class,'create'])->name('courses.create');
    Route::put('courses/{role}',[CourseController::class,'update'])->name('courses.update');
    Route::get('courses/{role}',[CourseController::class,'show'])->name('courses.show');
    Route::delete('courses/{role}',[CourseController::class,'destroy'])->name('courses.destroy');
    Route::get('courses/{role}/edit',[CourseController::class,'edit'])->name('courses.edit');
    

    Route::post('chapters/store',[ChapterController::class,'store'])->name('chapters.store');
    Route::get('chapters',[ChapterController::class,'index'])->name('chapters.index');
    Route::get('chapters/create/{id}',[ChapterController::class,'create'])->name('chapters.create');
    Route::put('chapters/{chapter}',[ChapterController::class,'update'])->name('chapters.update');
    Route::get('chapters/{chapter}',[ChapterController::class,'show'])->name('chapters.show');
    Route::delete('chapters/{chapter}',[ChapterController::class,'destroy'])->name('chapters.destroy');
    Route::get('chapters/{chapter}/edit',[ChapterController::class,'edit'])->name('chapters.edit');
    

    Route::post('chaptercontent/store',[ChapterContentController::class,'store'])->name('chaptercontent.store');
    Route::get('chaptercontent',[ChapterContentController::class,'index'])->name('chaptercontent.index');
    Route::get('chaptercontent/create/{id}',[ChapterContentController::class,'create'])->name('chaptercontent.create');
    Route::put('chaptercontent/{content}',[ChapterContentController::class,'update'])->name('chaptercontent.update');
    Route::get('chaptercontent/{content}',[ChapterContentController::class,'show'])->name('chaptercontent.show');
    Route::delete('chaptercontent/{content}',[ChapterContentController::class,'destroy'])->name('chaptercontent.destroy');
    Route::get('chaptercontent/{content}/edit',[ChapterContentController::class,'edit'])->name('chaptercontent.edit');
    
    Route::post('chapterequiz/store',[ChapterEvaluationController::class,'store'])->name('chapterequiz.store');
    Route::get('chapterequiz',[ChapterEvaluationController::class,'index'])->name('chapterequiz.index');
    Route::get('chapterequiz/create/{id}',[ChapterEvaluationController::class,'create'])->name('chapterequiz.create');
    Route::put('chapterequiz/{quiz}',[ChapterEvaluationController::class,'update'])->name('chapterequiz.update'); 
    Route::get('chapterequiz/{quiz}',[ChapterEvaluationController::class,'show'])->name('chapterequiz.show'); 
    Route::delete('chapterequiz/{quiz}',[ChapterEvaluationController::class,'destroy'])->name('chapterequiz.destroy');
    Route::get('chapterequiz/{quiz}/edit',[ChapterEvaluationController::class,'edit'])->name('chapterequiz.edit');
    
   

    //examenes
    Route::get('exams',[ExamController::class,'index'])->name('exam.index');
    Route::get('exams/create',[ExamController::class,'create'])->name('exam.create');
    Route::post('exams/store',[ExamController::class,'store'])->name('exam.store');
    Route::put('exams/{exam}',[ExamController::class,'update'])->name('exam.update');
    Route::delete('exams/{exam}',[ExamController::class,'destroy'])->name('exam.destroy');
    Route::get('exams/{exam}/edit',[ExamController::class,'edit'])->name('exam.edit');

    Route::get('exams/options/{opt}',[ExamController::class,'options'])->name('option.index');
    Route::get('exams/options/{opt}/create',[ExamController::class,'optionCreate'])->name('option.create');
    Route::post('exams/options/{opt}/store',[ExamController::class,'optionStore'])->name('option.store');
    Route::get('exams/options/{opt}/{quest}/edit',[ExamController::class,'optionEdit'])->name('option.edit');
    Route::put('exams/options/{opt}/{quest}',[ExamController::class,'optionUpdate'])->name('option.update');
});

Route::get('/', [Home::class,'index'])->name('front.home');
Route::get('/about-us', [Home::class,'aboutus'])->name('front.about');
Route::get('/services', [Home::class,'services'])->name('front.service');
Route::get('/employment', [Home::class,'employment'])->name('front.employment');
Route::post('/thanks',[Home::class,'employementThank'])->name('front.thanks');
Route::post('/thanks2',[Home::class,'formThank'])->name('front.thanks2');
Route::get('/generatepdf',[Home::class,'generatepdf']);
Route::get('/training-academy', [Home::class,'academy'])->name('front.academy');
Route::get('/training-academy/{detail}', [Home::class,'academyDetail'])->name('front.academydetail');

Route::get('/training-calendar', [Home::class,'training'])->name('front.calendar');
Route::get('/training-calendar/{id}/{slug}', [Home::class,'trainingDetail'])->name('front.detail');


Route::get('/contact', [Home::class,'contact'])->name('front.contact');
Route::post('/contact-gracias', [Home::class,'contactGracias'])->name('front.contactgracias');
Route::get('/checkout/{slug}', [CheckoutController::class,'index'])->name('checkout.checkout');
Route::post('/process', [CheckoutController::class,'process'])->name('checkout.process');
Route::get('/success/{session_id}', [CheckoutController::class,'success']);
Route::get('/cancel', [CheckoutController::class,'cancel']);
Route::get('/emailtemplate',[Home::class,'emailtemplate']);
Route::get('/form8850', [Home::class,'form8850'])->name('front.form8850');
Route::get('/setpdfcss',[Home::class,'setpdfcss'])->name('front.pdfcss');


Route::get('/industry/{slug}',[Home::class,'industryCard']);
Route::get('/industry/{cat}/{slug}',[Home::class,'industryDetail']);

Route::get('/blog',[Home::class,'blog']);
Route::get('/blog/{slug}',[Home::class,'blogDetail']);

Route::get('/courses',[Course::class,'index']);
Route::get('/courses/all',[Course::class,'todos']);
Route::get('/course/{slug}',[Course::class,'curso']);
Route::get('/course/{slug}/{chapters}',[Course::class,'cursoChapter']);
Route::get('/course/{slug}/{chapters}/{content}',[Course::class,'cursoChapterContent']);
Route::get('/testmaq',[CartController::class,'test']);
Route::post('/loginpop', [Home::class,'loginPop']);
//async course
Route::post('/async/course-content',[Course::class,'cursoContent']);
 
Route::group(['prefix' => 'cart'],function(){
    Route::get('/',[Home::class,'carrito']);
    Route::post('/process',[Home::class,'process']);
    Route::get('/remove/{id}',[Home::class,'removecart']);
    Route::get('/checksesion',[Home::class,'checksesion']);
    Route::get('/checksign',[Home::class,'checksign']);
    Route::get('/sign',[CartController::class,'sign']);
    Route::post('/process-signed',[CartController::class,'process']);
    Route::post('/sign-register',[CartController::class,'signRegister'])->name('sign.register');

    Route::post('/pay',[CartController::class,'process'])->name('cart.pay');

    Route::get('/success/{session_id}', [CartController::class,'success']);
    Route::get('/cancel', [CartController::class,'cancel']);
});

Route::group(['prefix'=>'learn'],function(){
    Route::get('/exam/{slug}/congratulation',[LearnController::class,'congratulation']);
    Route::get('/exam/{slug}/fail',[LearnController::class,'fail']);
    Route::get('/exam/{slug}/{id}',[LearnController::class,'cursoQuiz']);
    Route::get('/{slug}',[LearnController::class,'index']);
    Route::get('/{slug}/{chapter}',[LearnController::class,'chapter']);
    Route::get('/{slug}/{chapter}/quiz/{id}',[LearnController::class,'cursoChapterContentQuiz']);
    Route::get('/{slug}/{chapter}/{content}',[LearnController::class,'cursoChapterContent']);
    Route::post('/set-quiz',[LearnController::class,'setQuestion']);
    Route::post('/reset-quiz',[LearnController::class,'resetChapter']);

    
    
});

Route::group(['prefix'=>'user'],function(){
    Route::get('/',[UsuarioController::class,'index']);
    Route::get('/my-courses',[UsuarioController::class,'misCursos']);
    Route::post('/set-chapter',[UsuarioController::class,'setChapter']);
   
});
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
->name('ckfinder_connector');

/*Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
->name('ckfinder_browser');*/