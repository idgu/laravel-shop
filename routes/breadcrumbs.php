<?php

// Dashboard
Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.index'));
});

Breadcrumbs::register('admin.dashboard.categories', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Categories', route('admin.categories.index'));
});

Breadcrumbs::register('admin.dashboard.faqs', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Faqs', route('admin.faqs.index'));
});
Breadcrumbs::register('admin.dashboard.faqs.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard.faqs');
    $breadcrumbs->push('Faqs Create', route('admin.faqs.create'));
});


Breadcrumbs::register('admin.dashboard.orders', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Orders', route('admin.orders.index'));
});



Breadcrumbs::register('admin.dashboard.products', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Products', route('admin.products.index'));
});

Breadcrumbs::register('admin.dashboard.products.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard.products');
    $breadcrumbs->push('Create Product', route('admin.products.index'));
});
// Home > Blog > [Category]
Breadcrumbs::register('admin.dashboard.products.edit', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('admin.dashboard.products');
    $breadcrumbs->push($product->brand . ' ' . $product->model, route('admin.products.edit', $product->id));
});




Breadcrumbs::register('admin.dashboard.users', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.dashboard.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard.users');
    $breadcrumbs->push('Create User', route('admin.users.index'));
});
// Home > Blog > [Category]
Breadcrumbs::register('admin.dashboard.users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.dashboard.users');
    $breadcrumbs->push($user->name, route('admin.users.edit', $user->id));
});
