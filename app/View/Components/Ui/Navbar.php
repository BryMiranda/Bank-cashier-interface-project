<?php

namespace App\View\Components\Ui;

use App\Role;
use App\User;
use Illuminate\View\Component;

/**
 * Class Navbar
 * @package App\View\Components\Ui
 * @property User $user
 */
class Navbar extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function isActive($menuItem)
    {
        return collect($menuItem['options'])
            ->where('isActive', true)
            ->isNotEmpty();
    }

    public function isAuthorized($menuItem)
    {
        return $this->user->hasAnyRole($menuItem['roles'] ?? []);
    }

    public function menuItems()
    {
        return collect([
            [
                'title' => 'Tableros',
                'icon' => 'fa-columns',
                'roles' => [Role::ROLE_MAINTENANCE_MANAGER],
                'options' => [
                    [
                        'title' => 'Órdenes de Trabajo',
                        'url' => route('dashboards.work-orders.index'),
                        'isActive' => request()->routeIs('dashboards.work-orders.index'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Garantía',
                        'url' => route('dashboards.warranties.index'),
                        'isActive' => request()->routeIs('dashboards.warranties.index'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                ],
            ],
            [
                'title' => 'Mantenimiento',
                'icon' => 'fa-toolbox',
                'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT, Role::ROLE_TECHNICIAN],
                'options' => [
                    [
                        'title' => 'Clientes',
                        'url' => route('clients.index'),
                        'isActive' => request()->routeIs('clients.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Equipos',
                        'url' => route('equipments.index'),
                        'isActive' => request()->routeIs('equipments.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Garantías',
                        'url' => route('warranties.index'),
                        'isActive' => request()->routeIs('warranties.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Contratos',
                        'url' => route('contracts.index'),
                        'isActive' => request()->routeIs('contracts.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Órdenes de Trabajo',
                        'url' => route('work-orders.index'),
                        'isActive' => request()->routeIs('work-orders.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Mis Órdenes de Trabajo',
                        'url' => route('me.work-orders.index'),
                        'isActive' => request()->routeIs('me.work-orders.*'),
                        'roles' => [Role::ROLE_TECHNICIAN],
                    ],
                    [
                        'title' => 'Solicitudes de Trabajo',
                        'url' => route('work-requests.index'),
                        'isActive' => request()->routeIs('work-requests.*'),
                        'roles' => [Role::ROLE_MAINTENANCE_MANAGER, Role::ROLE_MAINTENANCE_ASSISTANT],
                    ],
                    [
                        'title' => 'Mis Solicitudes de Trabajo',
                        'url' => route('me.work-requests.index'),
                        'isActive' => request()->routeIs('me.work-requests.*'),
                        'roles' => [Role::ROLE_TECHNICIAN],
                    ],
                ],
            ],
            [
                'title' => 'Ventas',
                'icon' => 'fa-handshake',
                'roles' => [Role::ROLE_SALES_MANAGER, Role::ROLE_SALESPERSON],
                'options' => [
                    [
                        'title' => 'Negociaciones',
                        'url' => route('deals.index'),
                        'isActive' => request()->routeIs('deals.*'),
                        'roles' => [Role::ROLE_SALES_MANAGER],
                    ],
                    [
                        'title' => 'Túnel de Negociaciones',
                        'url' => route('deals.stages-board'),
                        'isActive' => request()->routeIs('deals.*'),
                        'roles' => [Role::ROLE_SALES_MANAGER, Role::ROLE_SALESPERSON],
                    ]
                ],
            ],
            [
                'title' => 'Administración',
                'icon' => 'fa-cogs',
                'roles' => [Role::ROLE_ADMIN],
                'options' => [
                    [
                        'title' => 'Usuarios',
                        'url' => route('users.index'),
                        'isActive' => request()->routeIs('users.*'),
                        'roles' => [Role::ROLE_ADMIN],
                    ],
                    [
                        'title' => 'Roles',
                        'url' => route('roles.index'),
                        'isActive' => request()->routeIs('roles.*'),
                        'roles' => [Role::ROLE_ADMIN],
                    ],
                    [
                        'title' => 'Productos',
                        'url' => route('products.index'),
                        'isActive' => request()->routeIs('products.*'),
                        'roles' => [Role::ROLE_ADMIN],
                    ],
                ],
            ],
        ]);
    }

    public function render()
    {
        return view('components.ui.navbar');
    }
}
