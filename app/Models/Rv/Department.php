<?php

namespace App\Models\Rv;

use App\Models\InfoPages\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rv\Traits\SelfReferenceTrait;
// use Rvwaarloos\Rvwaarloos\Database\Factories\DepartmentFactory;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;

// class Department extends Model implements HasMedia
class Department extends Model 
{
    use HasFactory;
    // use InteractsWithMedia;
    use SelfReferenceTrait;

    // protected static function newFactory()
    // {
    //     return DepartmentFactory::new();
    // }

    public static function departments(array $filter)
    {
        if ($filter != null) {
            $filter[] = ['parent_id', '=', null];
            return Department::where($filter)->with('groups')->paginate();
        } else {
            return Department::where('parent_id', null)->with('groups')->paginate();
        }
    }

    public static function orderedNames()
    {
        return Department::where('parent_id', null)->orderBy('name', 'Asc')->pluck('name')->toArray();
    }

    public static function orderedNamesAndIds()
    {
        return Department::where('parent_id', null)->orderBy('name', 'Asc')->pluck('name', 'id')->toArray();
    }

    public function groups()
    {
        return $this->children();
    }

    public function pages()
    {
        return $this->morphMany(Page::class, 'owner');
    }

    // public function clubmemberships()
    // {
    //     return $this->hasMany(ClubMembership::class);
    // }

    // public function canteenpermanences()
    // {
    //     return $this->hasMany(CanteenPermanence::class);
    // }

    // public function canteenteams()
    // {
    //     return $this->hasMany(CanteenTeam::class);
    // }

    // public function departmentpages()
    // {
    //     return $this->hasMany(DepartmentPage::class);
    // }

    // public function activeDepartmentPage(): ?DepartmentPage
    // {
    //     if ($this->departmentpages()->count() == 0) {
    //         return null;
    //     }
    //     return $this->departmentpages()->first();
    // }

    // // Media support
    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('department-logo')
    //         ->singleFile()
    //         ->acceptsFile(function ($file) {
    //             return $file->mimeType === 'image/jpeg';
    //         });
    // }

    // public function registerMediaConversions(?Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(50)
    //         ->height(50)
    //         ->nonQueued();
    // }
}
