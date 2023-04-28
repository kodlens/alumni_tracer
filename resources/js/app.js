/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue').default;
window.axios = require('axios');

import VueExcelXlsx from 'vue-excel-xlsx';
import Vue from 'vue';
import Buefy from 'buefy';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-page', require('./components/LoginPage.vue').default);

//welcome
Vue.component('welcome-page', require('./components/WelcomePage.vue').default);

//client
Vue.component('client-navbar', require('./components/client/ClientNavbar.vue').default);
Vue.component('registration-page', require('./components/client/RegistrationPage.vue').default);
Vue.component('profile-page', require('./components/client/ProfilePage.vue').default);
Vue.component('home-page', require('./components/client/HomePage.vue').default);
Vue.component('account-panel', require('./components/client/AccountPanel.vue').default);


//admin
Vue.component('admin-navbar', require('./components/panel/AdminNavbar.vue').default);
Vue.component('news-feed', require('./components/panel/NewsFeed.vue').default);
Vue.component('user-page', require('./components/panel/UserPage.vue').default);
Vue.component('program-list', require('./components/panel/ProgramList.vue').default);

//edit and update
Vue.component('user-edit', require('./components/panel/UserEdit.vue').default);

Vue.component('education-page', require('./components/panel/EducationPage.vue').default);
Vue.component('education-page-edit', require('./components/panel/EducationEdit.vue').default);

Vue.component('eligibility-page', require('./components/panel/EligibilityPage.vue').default);
Vue.component('eligibility-page-edit', require('./components/panel/EligibilityEdit.vue').default);


Vue.component('address-page', require('./components/panel/AddressPage.vue').default);

Vue.component('employment-page', require('./components/panel/EmploymentPage.vue').default);

//create user admin
Vue.component('user-page-create', require('./components/panel/UserPageCreate.vue').default);


//REPORT
Vue.component('report-program', require('./components/panel/Report/ReportProgram.vue').default);



Vue.component('csrf', require('./components/Csrf.vue').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueExcelXlsx);
 Vue.use(Buefy);

 Vue.filter('formatTime', function(value) {
    var timeString = value;
    var H = +timeString.substr(0, 2);
    var h = (H % 12) || 12;
    var ampm = H < 12 ? " AM" : " PM";
    timeString = h + timeString.substr(2, 3) + ampm;
    return timeString;
});



const app = new Vue({
    el: '#app',
});
