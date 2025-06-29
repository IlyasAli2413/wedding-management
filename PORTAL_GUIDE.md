# Wedding Management System - Portal Guide

## Overview

This wedding management system features separate portals for **Administrators** and **Users**, each with distinct functionalities and access levels.

## Portal Structure

### 🏠 Welcome Page (`/`)
- **Location**: `resources/views/welcome.blade.php`
- **Purpose**: Main landing page with portal selection options
- **Features**: 
  - Portal selection buttons
  - Feature overview for each portal
  - Link to dedicated portal selection page

### 🔗 Portal Selection (`/portal`)
- **Location**: `resources/views/portal-select.blade.php`
- **Purpose**: Dedicated portal selection interface
- **Features**: 
  - Clean portal selection interface
  - Detailed feature comparison
  - Back navigation to welcome page

## 👑 Admin Portal

### Access
- **Login URL**: `/admin/login`
- **Dashboard**: `/admin/dashboard`
- **Middleware**: `admin` (checks for admin role)

### Features
- **Full System Management**:
  - View all orders across all users
  - Manage all payments
  - Full CRUD operations on venues
  - Full CRUD operations on menu items
  - Manage staff members
  - Manage clients
  - System statistics and analytics

### Routes
```
/admin/dashboard          - Admin dashboard
/admin/orders/*          - Order management
/admin/payments/*        - Payment management
/admin/venues/*          - Venue management
/admin/menu-items/*      - Menu item management
/admin/staffmembers/*    - Staff management
/admin/clients/*         - Client management
```

### Navigation
- **Location**: `resources/views/layouts/navigation.blade.php`
- **Features**: 
  - Role-based navigation display
  - Admin-specific menu items
  - Proper logout routing

## 💒 User Portal

### Access
- **Login URL**: `/user/login`
- **Dashboard**: `/user/dashboard`
- **Middleware**: `user` (checks for non-admin role)

### Features
- **Personal Management**:
  - View own orders only
  - Manage own payments
  - Browse venues (read-only)
  - View menu items (read-only)
  - Personal dashboard with statistics

### Routes
```
/user/dashboard          - User dashboard
/user/orders/*          - Personal order management
/user/payments/*        - Personal payment management
/user/venues/*          - Venue browsing (read-only)
/user/menu-items/*      - Menu item browsing (read-only)
```

### Navigation
- **Features**: 
  - User-specific navigation
  - Limited access to features
  - Proper logout routing

## 🔐 Authentication System

### Admin Authentication
- **Controller**: `App\Http\Controllers\Auth\AdminAuthController`
- **Login View**: `resources/views/auth/admin-login.blade.php`
- **Features**:
  - Validates admin role on login
  - Redirects non-admin users
  - Proper session management

### User Authentication
- **Controller**: `App\Http\Controllers\Auth\UserAuthController`
- **Login View**: `resources/views/auth/user-login.blade.php`
- **Features**:
  - Validates non-admin role on login
  - Redirects admin users to admin portal
  - Proper session management

## 🛡️ Security & Middleware

### AdminMiddleware
- **Location**: `app/Http/Middleware/AdminMiddleware.php`
- **Purpose**: Ensures only admin users can access admin routes
- **Behavior**: 
  - Checks authentication
  - Validates admin role
  - Logs out non-admin users
  - Redirects to admin login

### UserMiddleware
- **Location**: `app/Http/Middleware/UserMiddleware.php`
- **Purpose**: Ensures only regular users can access user routes
- **Behavior**:
  - Checks authentication
  - Validates non-admin role
  - Redirects admin users to admin dashboard

## 🎨 User Interface

### Admin Dashboard
- **Location**: `resources/views/admin/dashboard.blade.php`
- **Features**:
  - System-wide statistics
  - Recent orders and payments
  - Quick action buttons
  - Professional admin interface

### User Dashboard
- **Location**: `resources/views/dashboard.blade.php`
- **Features**:
  - Personal statistics
  - Recent personal orders and payments
  - Quick action buttons
  - User-friendly interface

## 🔄 Automatic Redirection

### PortalController
- **Location**: `app/Http\Controllers/PortalController.php`
- **Methods**:
  - `redirect()`: Automatically redirects authenticated users to appropriate portal
  - `select()`: Shows portal selection for guests

### Routes
```
/portal/redirect         - Automatic portal redirection
/portal                  - Portal selection page
```

## 🗄️ Database Structure

### User Roles
- **Admin**: `role = 'admin'` - Full system access
- **User**: `role = 'user'` - Limited personal access

### Key Models
- `User`: Authentication and role management
- `Order`: Wedding orders with user association
- `Payment`: Payment records with user association
- `Venue`: Venue information
- `WeddingMenuItem`: Menu items
- `StaffMember`: Staff management
- `Client`: Client information

## 🚀 Getting Started

1. **Access the System**: Visit the root URL `/`
2. **Choose Portal**: Select Admin or User portal
3. **Login**: Use appropriate credentials
4. **Navigate**: Use the role-specific navigation menu

## 🔧 Configuration

### Middleware Registration
- **Location**: `bootstrap/app.php`
- **Aliases**: 
  - `admin` → `AdminMiddleware`
  - `user` → `UserMiddleware`

### Route Groups
- **Admin Routes**: Prefixed with `/admin`, protected by `admin` middleware
- **User Routes**: Prefixed with `/user`, protected by `user` middleware

## 📝 Notes

- Users can only access their own data (orders, payments)
- Admins have access to all system data
- Proper role validation on all routes
- Clean separation of concerns between portals
- Responsive design for all interfaces
- Secure authentication and authorization 