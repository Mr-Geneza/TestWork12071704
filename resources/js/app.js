/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import WorksIndex from './components/works/WorksIndex.vue';
import WorksCreate from './components/works/WorksCreate.vue';
import WorksEdit from './components/works/WorksEdit.vue';

const routes = [
	{
		path: '/',
		components: {
			worksIndex: WorksIndex
		}
	},
	{ path: '/admin/works/create', component: WorksCreate, name: 'createWork' },
	{ path: '/admin/works/edit/:id', component: WorksEdit, name: 'editWork' },
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')