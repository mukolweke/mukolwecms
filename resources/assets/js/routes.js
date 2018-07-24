import Admin_Index from './components/admin/advisors/IndexAdmin'
import Create_Advisor from './components/admin/advisors/CreateFA'
import Edit_Advisor from './components/admin/advisors/EditFA'


export const routes = [
    {
        path: '/admin_dash',
        component: Admin_Index,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin_dash/create_fa',
        component: Create_Advisor,
        name: 'createAdvisor'
    },
    {
        path: '/admin_dash/edit/:id',
        component: Edit_Advisor,
        name: 'editAdvisor'
    },
];
