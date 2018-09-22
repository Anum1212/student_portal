<?php



Route::get('/', function () {
    return view('welcome');
});



// |---------------------------------- testController Routes ----------------------------------|
Route::prefix('test')->group(function () {
    Route::get('/', 'testController@index');
});


// |---------------------------------- Authentication Routes Routes ----------------------------------|
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



// |---------------------------------- superadmin Routes ----------------------------------|
Route::prefix('superAdmin')->group(function () {
    Route::get('/dashboard', 'superAdminController@dashboard')->name('superAdmin.dashboard');
    // ************ DEPARTMENT MANAGEMENT ROUTES ************
    Route::get('/viewAllDepartments', 'superAdminController@viewAllDepartments')->name('superAdmin.viewAllDepartments');
    Route::get('/viewAllDepartmentAnnouncements/{departmentId}', 'superAdminController@viewAllDepartmentAnnouncements')->name('superAdmin.viewAllDepartmentAnnouncements');
    Route::get('/addDepartmentForm', 'superAdminController@addDepartmentForm')->name('superAdmin.addDepartmentForm');
    Route::post('/addDepartment', 'superAdminController@addDepartment')->name('superAdmin.addDepartment');
    Route::get('/editDepartmentForm/{departmentId}', 'superAdminController@editDepartmentForm')->name('superAdmin.editDepartmentForm');
    Route::put('/editDepartment/{departmentId}', 'superAdminController@editDepartment')->name('superAdmin.editDepartment');
    Route::get('/searchDepartment', 'superAdminController@searchDepartment')->name('superAdmin.searchDepartment');
    Route::delete('/deleteDepartment/{departmentId}', 'superAdminController@deleteDepartment')->name('superAdmin.deleteDepartment');
    // ************ DEPARTMENT ADMIN MANAGEMENT ROUTES ************
    Route::get('/viewAllDepartmentAdmins', 'superAdminController@viewAllDepartmentAdmins')->name('superAdmin.viewAllDepartmentAdmins');
    Route::get('/addDepartmentAdminForm', 'superAdminController@addDepartmentAdminForm')->name('superAdmin.addDepartmentAdminForm');
    Route::post('/addDepartmentAdmin', 'superAdminController@addDepartmentAdmin')->name('superAdmin.addDepartmentAdmin');
    Route::get('/editDepartmentAdminForm/{departmentAdminId}', 'superAdminController@editDepartmentAdminForm')->name('superAdmin.editDepartmentAdminForm');
    Route::put('/editDepartmentAdmin/{departmentAdminId}', 'superAdminController@editDepartmentAdmin')->name('superAdmin.editDepartmentAdmin');
    Route::get('/searchDepartmentAdmin', 'superAdminController@searchDepartmentAdmin')->name('superAdmin.searchDepartmentAdmin');
    Route::delete('/deleteDepartmentAdmin/{departmentAdminId}', 'superAdminController@deleteDepartmentAdmin')->name('superAdmin.deleteDepartmentAdmin');
    // ************ SOCIETY MANAGEMENT ROUTES ************
    Route::get('/viewAllSocieties', 'superAdminController@viewAllSocieties')->name('superAdmin.viewAllSocieties');
    Route::get('/viewAllSocietyAnnouncements/{societyId}', 'superAdminController@viewAllSocietyAnnouncements')->name('superAdmin.viewAllSocietyAnnouncements');
    Route::get('/addSocietyForm', 'superAdminController@addSocietyForm')->name('superAdmin.addSocietyForm');
    Route::post('/addSociety', 'superAdminController@addSociety')->name('superAdmin.addSociety');
    Route::get('/editSocietyForm/{societyId}', 'superAdminController@editSocietyForm')->name('superAdmin.editSocietyForm');
    Route::put('/editSociety/{societyId}', 'superAdminController@editSociety')->name('superAdmin.editSociety');
    Route::get('/searchSociety', 'superAdminController@searchSociety')->name('superAdmin.searchSociety');
    Route::delete('/deleteSociety/{societyId}', 'superAdminController@deleteSociety')->name('superAdmin.deleteSociety');
    // ************ SOCIETY ADMIN MANAGEMENT ROUTES ************
    Route::get('/viewAllSocietyAdmins', 'superAdminController@viewAllSocietyAdmins')->name('superAdmin.viewAllSocietyAdmins');
    Route::get('/addSocietyAdminForm', 'superAdminController@addSocietyAdminForm')->name('superAdmin.addSocietyAdminForm');
    Route::post('/addSocietyAdmin', 'superAdminController@addSocietyAdmin')->name('superAdmin.addSocietyAdmin');
    Route::get('/editSocietyAdminForm/{societyAdminId}', 'superAdminController@editSocietyAdminForm')->name('superAdmin.editSocietyAdminForm');
    Route::put('/editSocietyAdmin/{societyAdminId}', 'superAdminController@editSocietyAdmin')->name('superAdmin.editSocietyAdmin');
    Route::get('/searchSocietyAdmin', 'superAdminController@searchSocietyAdmin')->name('superAdmin.searchSocietyAdmin');
    Route::delete('/deleteSocietyAdmin/{societyAdminId}', 'superAdminController@deleteSocietyAdmin')->name('superAdmin.deleteSocietyAdmin');
    // ************ STUDENT MANAGEMENT ROUTES ************
    Route::get('/viewAllStudents', 'superAdminController@viewAllStudents')->name('superAdmin.viewAllStudents');
    Route::get('/addStudentForm', 'superAdminController@addStudentForm')->name('superAdmin.addStudentForm');
    Route::post('/addStudent', 'superAdminController@addStudent')->name('superAdmin.addStudent');
    Route::get('/editStudentForm/{StudentId}', 'superAdminController@editStudentForm')->name('superAdmin.editStudentForm');
    Route::put('/editStudent/{StudentId}', 'superAdminController@editStudent')->name('superAdmin.editStudent');
    Route::get('/searchStudent', 'superAdminController@searchStudent')->name('superAdmin.searchStudent');
    Route::delete('/deleteStudent/{StudentId}', 'superAdminController@deleteStudent')->name('superAdmin.deleteStudent');
    // ************ MESSAGE MANAGEMENT ROUTES ************
    Route::get('/viewAllMessages/{senderType}', 'superAdminController@viewAllMessages')->name('superAdmin.viewAllMessages');
    Route::get('/viewMessage/{id}', 'superAdminController@viewMessage')->name('superAdmin.viewMessage');
    Route::post('/sendMessage/{replyToMessageId}', 'superAdminController@sendMessage')->name('superAdmin.sendMessage');
    Route::get('/deleteMessage/{id}', 'superAdminController@deleteMessage')->name('superAdmin.deleteMessage');
});



// |---------------------------------- departmentadmin Routes ----------------------------------|
Route::prefix('departmentAdmin')->group(function () {
    Route::get('/dashboard', 'departmentAdminController@dashboard')->name('departmentAdmin.dashboard');
    Route::get('/viewAllAnnouncements', 'departmentAdminController@viewAllAnnouncements')->name('departmentAdmin.viewAllAnnouncements');
    Route::get('/addAnnouncementForm', 'departmentAdminController@addAnnouncementForm')->name('departmentAdmin.addAnnouncementForm');
    Route::post('/addAnnouncement', 'departmentAdminController@addAnnouncement')->name('departmentAdmin.addAnnouncement');
    Route::get('/editAnnouncementForm/{announcementId}', 'departmentAdminController@editAnnouncementForm')->name('departmentAdmin.editAnnouncementForm');
    Route::put('/editAnnouncement/{announcementId}', 'departmentAdminController@editAnnouncement')->name('departmentAdmin.editAnnouncement');
    Route::get('/searchAnnouncement', 'departmentAdminController@searchAnnouncement')->name('departmentAdmin.searchAnnouncement');
    Route::delete('/deleteAnnouncement/{announcementId}', 'departmentAdminController@deleteAnnouncement')->name('departmentAdmin.deleteAnnouncement');
    Route::get('/senderDetails/{senderId}', 'departmentAdminController@senderDetails')->name('departmentAdmin.senderDetails');
// ************ MESSAGE MANAGEMENT ROUTES ************
    Route::get('/viewAllMessages', 'departmentAdminController@viewAllMessages')->name('departmentAdmin.viewAllMessages');
    Route::get('/viewMessage/{id}', 'departmentAdminController@viewMessage')->name('departmentAdmin.viewMessage');
    Route::post('/sendMessage/{messageId?}', 'departmentAdminController@sendMessage')->name('departmentAdmin.sendMessage');
    Route::get('/deleteMessage/{id}', 'departmentAdminController@deleteMessage')->name('departmentAdmin.deleteMessage');
});



// |---------------------------------- societyadmin Routes ----------------------------------|
    Route::prefix('societyAdmin')->group(function () {
    Route::get('/dashboard', 'societyAdminController@dashboard')->name('societyAdmin.dashboard');
    Route::get('/viewAllAnnouncements', 'societyAdminController@viewAllAnnouncements')->name('societyAdmin.viewAllAnnouncements');
    Route::get('/addAnnouncementForm', 'societyAdminController@addAnnouncementForm')->name('societyAdmin.addAnnouncementForm');
    Route::post('/addAnnouncement', 'societyAdminController@addAnnouncement')->name('societyAdmin.addAnnouncement');
    Route::get('/editAnnouncementForm/{announcementId}', 'societyAdminController@editAnnouncementForm')->name('societyAdmin.editAnnouncementForm');
    Route::put('/editAnnouncement/{announcementId}', 'societyAdminController@editAnnouncement')->name('societyAdmin.editAnnouncement');
    Route::get('/searchAnnouncement', 'societyAdminController@searchAnnouncement')->name('societyAdmin.searchAnnouncement');
    Route::delete('/deleteAnnouncement/{announcementId}', 'societyAdminController@deleteAnnouncement')->name('societyAdmin.deleteAnnouncement');
    Route::get('/senderDetails/{senderId}', 'societyAdminController@senderDetails')->name('societyAdmin.senderDetails');
// ************ MESSAGE MANAGEMENT ROUTES ************
    Route::get('/viewAllMessages', 'societyAdminController@viewAllMessages')->name('societyAdmin.viewAllMessages');
    Route::get('/viewMessage/{id}', 'societyAdminController@viewMessage')->name('societyAdmin.viewMessage');
    Route::post('/sendMessage/{messageId?}', 'societyAdminController@sendMessage')->name('societyAdmin.sendMessage');
    Route::get('/deleteMessage/{id}', 'societyAdminController@deleteMessage')->name('societyAdmin.deleteMessage');
});



// |---------------------------------- student Routes ----------------------------------|
    Route::prefix('student')->group(function () {
    Route::get('/dashboard', 'studentController@dashboard')->name('student.dashboard');
    Route::get('/departmentAnnouncements', 'studentController@departmentAnnouncements')->name('student.departmentAnnouncements');
    Route::get('/societyAnnouncements', 'studentController@societyAnnouncements')->name('student.societyAnnouncements');
    Route::get('/manageSocieties', 'studentController@manageSocieties')->name('student.manageSocieties');
    Route::get('/addSociety', 'studentController@addSociety')->name('student.addSociety');
    Route::get('/manageSocietyNotifications/{societyId}', 'studentController@manageSocietyNotifications')->name('student.manageSocietyNotifications');
    Route::get('/deleteSociety/{societyId}', 'studentController@deleteSociety')->name('student.deleteSociety');
    // ************ MESSAGE MANAGEMENT ROUTES ************
    Route::get('/viewAllMessages', 'studentController@viewAllMessages')->name('student.viewAllMessages');
    Route::get('/viewMessage/{id}', 'studentController@viewMessage')->name('student.viewMessage');
    Route::post('/sendMessage/{messageId?}', 'studentController@sendMessage')->name('student.sendMessage');
    Route::get('/deleteMessage/{id}', 'studentController@deleteMessage')->name('student.deleteMessage');
});
