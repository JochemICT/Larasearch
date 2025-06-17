# Larasearch

**Larasearch** is a lightweight and efficient Laravel package that adds reusable multi-column search functionality to your Eloquent models. It simplifies search logic by letting you define searchable attributes directly inside your models, keeping your controllers clean and your code DRY.

---

## Features

- Easily add multi-column search to any Eloquent model  
- Define searchable fields once per model  
- Simple query scope for quick integration  
- Clean, reusable, and centralized search logic  
- Lightweight with minimal dependencies  
- Compatible with Laravel 8, 9, and 10

---

## Installation

Install Larasearch via Composer:

```bash
composer require jochemict/larasearch
```

## Usage

1. Add the Larasearchable trait to your model
```php
use JochemICT\Larasearch\Larasearchable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Larasearchable;

    /**
     * The attributes that are searchable via Larasearch.
     *
     * @var array
     */
    protected $searchable = ['name', 'email', 'city'];
}
```

2. Use the search scope in your queries
```php
public function index(Request $request)
{
    $searchTerm = $request->input('search');

    $users = User::search($searchTerm)->get();

    return view('users.index', compact('users'));
}
```

## Examples

Search with pagination
```php
$users = User::search($request->input('search'))->paginate(15);
```

Combine search with other query constraints
```php
$users = User::where('active', true)
             ->search($request->input('search'))
             ->get();
```

Return all results if no search term is provided
```php
$users = User::search(null)->get(); // returns all users
```

## Requirements

- PHP 7.4 or higher
- Laravel 8.x, 9.x, or 10.x
- Illuminate/database (included with Laravel)

## Contributing
Contributions and feature requests are welcome! Please open an issue or submit a pull request on the GitHub repository.

## License
Licensed under the MIT License. See the LICENSE file for details.

## Contact
Created by JochemICT  
[GitHub](https://github.com/jochemICT)
[Email](mailto:jochem@meurer.email)




