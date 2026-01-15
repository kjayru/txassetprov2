# TXAssetPro - AI Coding Agent Instructions

## Project Overview
TXAssetPro is a **Laravel 8 + Bootstrap 5 e-learning platform** for security training courses with Stripe payment integration, quiz systems, and PDF certificate generation.

## Architecture & Major Components

### Backend Structure (Laravel MVC)
- **Frontend Controllers** (`app/Http/Controllers/frontend/`): Public-facing pages - course catalog, checkout (Stripe), shopping cart, and learning interface
- **Backend Controllers** (`app/Http/Controllers/backend/`): Admin panel - course management, user enrollment, orders, content creation
- **Route Organization** (`routes/web.php`):
  - `/admin/*` - Backend admin routes (requires auth)
  - `/cart/*` - Shopping cart operations
  - `/learn/*` - Course learning interface (authenticated users only)
  - `/user/*` - User profile & settings

### Core Domain Models
The platform tracks detailed user progress through a hierarchical structure:
- **Course** → **Chapters** → **ChapterContents** → **ChapterQuiz**
- **UserCourse** → **UserCourseChapter** → **UserCourseChapterContent** (progress tracking at each level)
- **ExamCourse** + **ExamQuestion** + **ExamQuestionOption** (final course exams)
- **UserCourseExam** + **UserCourseExamResult** (exam attempts & results)

Key model patterns:
- `UserCourse::porcentajes($course_id, $user_id)` - Calculate exam completion percentages
- `Course::info($id)` - Static method to retrieve formatted course data
- Models use Eloquent relationships extensively: `hasMany`, `belongsTo`, `belongsToMany`

### Email System (`app/Mail/`)
All mailables extend `Illuminate\Mail\Mailable` with standardized structure:
- Sender: `support@txassetpro.com`
- Templates in `resources/views/mail/` use inline CSS for email client compatibility
- Common emails: `Bienvenido` (welcome), `Aprobado`/`Rechazado` (exam pass/fail), `Order`, `Contact`
- Template pattern: Pass data via constructor → `$this->data` → access in Blade with `{{@$nombre}}`

### Frontend Assets
- **Laravel Mix** (`webpack.mix.js`): Compiles `resources/sass/app.scss` → `public/css/cursos`
- **BrowserSync** configured for `https://txassetpro.test` (local dev)
- Bootstrap 5.2.2 + custom SASS
- Run: `npm run dev` (watch) or `npm run prod` (production build)

## Critical Developer Workflows

### Development Setup
```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env  # Configure DB_*, STRIPE_*, MAIL_*
php artisan key:generate

# Database
php artisan migrate
php artisan db:seed  # If seeders exist

# Asset compilation
npm run dev  # Development with BrowserSync
npm run watch  # Watch for changes

# Serve application
php artisan serve  # Or use Laravel Valet/Homestead
```

### Key Artisan Commands
- `php artisan migrate:fresh --seed` - Reset database completely
- `php artisan storage:link` - Link storage for uploaded files (banners, videos)
- `php artisan route:list` - View all registered routes
- `php artisan config:cache` - Cache configuration (production)

## Project-Specific Conventions

### Naming Patterns
- **Controllers**: Prefix with namespace - `backend/CourseController`, `frontend/CourseController`
- **Routes**: Named routes use dot notation - `adminuser.index`, `courses.show`, `checkout.process`
- **Slugs**: Auto-generated with `Str::slug($title, '-')` for SEO-friendly URLs
- **Views**: Mirror controller structure - `resources/views/backend/courses/`, `resources/views/frontend/`

### Code Patterns
1. **Authentication Check**: Controllers use `$this->middleware('auth')` in `__construct()`
2. **Profile Verification**: Learning features check if user completed profile before access
   ```php
   $profile = Profile::where('user_id', $user_id)->count();
   if($profile==0) { return redirect()->route('profile.index'); }
   ```
3. **Course Menu Building**: Use `CourseMenuTrait::getContent($capitulos, $curso)` for navigation structure
4. **File Uploads**: Store with `$request->file('banner')->store('banner')` → saved path to DB
5. **Environment URLs**: Email templates use `{{env('APP_URL')}}/images/...` for absolute paths

### Data Flow Examples
**User Enrolls in Course**:
1. `CheckoutController::process()` - Stripe payment
2. Creates `CourseOrder` + `UserCourse` records
3. Sends `Order` mailable
4. User redirected to `/learn/{user_course_id}/{slug}`

**Progress Tracking**:
1. `LearnController::index()` - Loads current position
2. Queries `UserCourseChapter` → `UserCourseChapterContent` for visited items
3. Trait builds side navigation with completion status
4. Quiz results stored in `UserCourseChapterQuiz` / `UserCourseExamResult`

## Integration Points

### Third-Party Services
- **Stripe** (`stripe/stripe-php`): Payment processing in `CheckoutController`
- **SendGrid** (`sendgrid/sendgrid`): Email delivery (see `config/mail.php`)
- **DomPDF** (`barryvdh/laravel-dompdf`): Generate course certificates
- **Spatie Permissions** (`spatie/laravel-permission`): Role-based access control
- **CKFinder** (`ckfinder/ckfinder-laravel-package`): File manager for admin panel

### External Assets
- Course banners/videos stored in `storage/app/` → symlinked to `public/storage/`
- Public assets: `/public/images/`, `/public/css/`, `/public/js/`
- Vendor libraries: `/public/backend/plugins/` (admin UI components)

## Testing & Debugging
- PHPUnit configured (`phpunit.xml`) - Run: `php artisan test`
- Laravel Telescope (if installed) for debugging
- Check logs: `storage/logs/laravel.log`
- Browser console for Mix compilation errors

## Important Context
- **Language Mix**: Some model names in Spanish (e.g., `Bienvenido`), routes/controllers in English
- **User Types**: Regular users (students) + admins (via Spatie permissions)
- **Course Access**: Timed access controlled by `Course.tiempovalido` field (validity period)
- **Certification**: Course completion triggers certificate generation (`adminuser.certificado` route)
