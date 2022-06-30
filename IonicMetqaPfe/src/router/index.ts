import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import HomePage from '../views/HomePage.vue'
import InscriptionPage from '../views/InscriptionPage.vue'
import ConnectionPage from '../views/ConnectionPage.vue'
/**********************Admin***************************/
import AdminHome from '../views/admin/AdminHome.vue'
import UsersPage from '../views/admin/UsersPage.vue'
import AddUsers from '../views/admin/AddUsers.vue'
import EditUsers from '../views/admin/EditUsers.vue'
import StocksPage from '../views/admin/StocksPage.vue'
import AddStocks from '../views/admin/AddStocks.vue'
import EditStocks from '../views/admin/EditStocks.vue'
import ArchivesPage from '../views/admin/ArchivesPage.vue'
import AddArchives from '../views/admin/AddArchives.vue'
import FournisseursPage from '../views/admin/Fournisseurs.vue'
import AddFournisseurs from '../views/admin/AddFournisseurs.vue'
import ReclamationPage from '../views/admin/ReclamationPage.vue'
import AddReclamation from '../views/admin/AddReclamation.vue'
import CommandesPage from '../views/admin/CommandePage.vue'
import FacturePage from '../views/admin/FacturePage.vue'
/**********************Client***************************/
import ClientHome from '../views/client/ClientHome.vue'
import CommandePage from '../views/client/CommandePage.vue'
import AddCommandes from '../views/client/AddCommandes.vue'
import PartenairesPage from '../views/client/PartenairePage.vue'
import ContactPage from '../views/client/ContactPage.vue'
/**********************Chef***************************/
import ChefHome from '../views/chef/ChefHome.vue'
import ArchivePage from '../views/chef/ArchivePage.vue'
import AddArchive from '../views/chef/AddArchive.vue'
import ReclamationssPage from '../views/chef/ReclamationssPage.vue'
import AddReclamationss from '../views/chef/AddReclamationss.vue'
/**********************Ingenieur***************************/
import IngenieurHome from '../views/ingenieur/IngenieurHome.vue'
import ReclamationsPage from '../views/ingenieur/ReclamationPage.vue'
import ArchivessPage from '../views/chef/ArchivePage.vue'
import AddArchivess from '../views/chef/AddArchive.vue'


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'Home',
    component: HomePage
  },

  {
    path: '/inscription',
    name: 'InscriptionPage',
    component: InscriptionPage
  },
  {
    path: '/connection',
    name: 'ConnectionPage',
    component: ConnectionPage
  }
  /******************************admin***************************/
  ,
  {
    path: '/adminhome',
    name: 'AdminHome',
    component: AdminHome
  },

  {
    path: '/users',
    name: 'UsersPage',
    component: UsersPage
  },
  {
    path: '/addusers',
    name: 'AddUsers',
    component: AddUsers
  },
  {
    path: '/editusers',
    name: 'EditUsers',
    component: EditUsers
  },
  {
    path: '/stocks',
    name: 'StocksPage',
    component: StocksPage
  },
  {
    path: '/addstocks',
    name: 'AddStocks',
    component: AddStocks
  },
  {
    path: '/editstocks',
    name: 'EditStocks',
    component: EditStocks
  },
  {
    path: '/archives',
    name: 'ArchivesPage',
    component: ArchivesPage
  },
  {
    path: '/addarchives',
    name: 'AddArchives',
    component: AddArchives
  },
  {
    path: '/fournisseurs',
    name: 'FournisseursPage',
    component: FournisseursPage
  },
  {
    path: '/addfournisseurs',
    name: 'AddFournisseurs',
    component: AddFournisseurs
  },
  {
    path: '/reclamations',
    name: 'ReclamationPage',
    component: ReclamationPage
  },
  {
    path: '/addreclamation',
    name: 'AddReclamation',
    component: AddReclamation
  },
  {
    path: '/commandes',
    name: 'CommandesPage',
    component: CommandesPage
  },
  {
    path: '/factures',
    name: 'FacturePage',
    component: FacturePage
  }
  /******************************client***************************/
  ,
  {
    path: '/clienthome',
    name: 'ClientHome',
    component: ClientHome
  },
  {
    path: '/commandess',
    name: 'CommandePage',
    component: CommandePage
  },
  {
    path: '/addcommandes',
    name: 'AddCommandes',
    component: AddCommandes
  },
  {
    path: '/partenaires',
    name: 'PartenairesPage',
    component: PartenairesPage
  },
  {
    path: '/contact',
    name: 'ContactPage',
    component: ContactPage
  }
  /******************************chef***************************/
  ,
  {
    path: '/chefhome',
    name: 'ChefHome',
    component: ChefHome
  },
  {
    path: '/archive',
    name: 'ArchivePage',
    component: ArchivePage
  },
  {
    path: '/addarchive',
    name: 'AddArchive',
    component: AddArchive
  },
  {
    path: '/reclamationss',
    name: 'ReclamationssPage',
    component: ReclamationssPage
  },
  {
    path: '/addreclamationss',
    name: 'AddReclamationss',
    component: AddReclamationss
  }
  /******************************ingenieur***************************/
  ,
  {
    path: '/ingenieurhome',
    name: 'IngenieurHome',
    component: IngenieurHome
  },
  {
    path: '/archivess',
    name: 'ArchivessPage',
    component: ArchivessPage
  },
  {
    path: '/addarchivess',
    name: 'AddArchivess',
    component: AddArchivess
  },
  {
    path: '/reclamationn',
    name: 'ReclamationsPage',
    component: ReclamationsPage
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
