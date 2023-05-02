
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'home', component: () => import('pages/IndexPage.vue') }
    ]
  },
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'users', component: () => import('pages/UsersPage.vue') }
    ]
  },
  {
    path: '/CreatEdit/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'creatEdit', name: 'create', component: () => import('pages/CreatEdit.vue') }
    ]
  },

  {
    path: '/CreatEdit/:id',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'edit', component: () => import('pages/CreatEdit.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
