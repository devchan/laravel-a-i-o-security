# Laravel A I O Security

## Useful package for improving application security in your Laravel stuffs

## 'password_expired' => \Devchan\LaravelAIOSecurity\Http\Middleware\PasswordExpired::class,

## 'password_changed_at' => Carbon::now()->toDateTimeString(),

## use Carbon\Carbon;

##    protected $fillable = [
##        'name', 'email', 'password', 'password_changed_at',
##    ];

## 'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 30),
--------------------------------------------------------------------

## \Devchan\LaravelAIOSecurity\Http\Middleware\ForceHttps::class,

## 'https_force' => env('HTTPS_FORCE', false),