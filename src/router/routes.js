
const routes = [
  {
    path: '/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Empleados.vue') },
      { path: '/Search', component: () => import('pages/Search.vue') },
      { path: '/Proveedores', component: () => import('pages/Proveedores.vue') },
      { path: '/Prov', component: () => import('pages/Prov.vue') },
      { path: '/muni', component: () => import('pages/muni.vue') },
      { path: '/Transacciones', component: () => import('pages/Transacciones.vue') }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
