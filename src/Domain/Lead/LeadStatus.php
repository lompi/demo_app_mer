<?php

namespace App\Domain\Lead;

enum LeadStatus
{
    case New;
    case ReservedProducts;
    case Completed;
}
