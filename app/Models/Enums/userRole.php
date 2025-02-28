<?php

namespace App\Models\Enums;

enum userRole: string
{
  case ADMIN = "admin";
  case EMPLOYEE = "employee";
  case CUSTOMER = "customer";
}
