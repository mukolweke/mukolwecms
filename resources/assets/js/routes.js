import Admin_Index from './components/admin/advisors/IndexAdmin'
import Create_Advisor from './components/admin/advisors/CreateFA'
import Edit_Advisor from './components/admin/advisors/EditFA'
import View_Clients from './components/admin/clients/ViewClients'


export const routes = [
    {
        path: '/view_fa',
        component: Admin_Index,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/view_clients',
        component: View_Clients,
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
