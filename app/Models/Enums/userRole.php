<?php

namespace App\Models\Enums;

enum UserRole: string
{
  case ADMIN = "admin";
  case EMPLOYEE = "employee";
  case CUSTOMER = "customer";
}
