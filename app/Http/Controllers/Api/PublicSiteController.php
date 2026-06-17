<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Contact as ContactMail;
use App\Mail\Employment as EmploymentMail;
use App\Mail\Form8850 as Form8850Mail;
use App\Models\Archivo;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Disclaimer;
use App\Models\Education;
use App\Models\Employment as EmployModel;
use App\Models\Event;
use App\Models\Form;
use App\Models\Industry;
use App\Models\Information;
use App\Models\Military;
use App\Models\Post;
use App\Models\Reference;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicSiteController extends Controller
{
    public function home(): JsonResponse
    {
        $categories = Category::orderBy('orden', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->limit(4)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'hero' => [
                    'title' => 'YOUR SECURITY IS OUR BUSINESS',
                    'subtitle' => 'Veteran owned and operated security solutions for clients who expect reliability, professionalism, and active site awareness.',
                    'primary_cta' => [
                        'label' => 'GET A QUOTE',
                        'url' => '/contact',
                    ],
                    'secondary_cta' => [
                        'label' => 'EXPLORE SERVICES',
                        'url' => '/services',
                    ],
                ],
                'about' => [
                    'title' => 'ABOUT US',
                    'summary' => 'TAP Security was founded with the vision to challenge the security service industry by proactively placing the client needs first.',
                ],
                'featured_categories' => $categories->map(function (Category $category) {
                    return [
                        'id' => $category->id,
                        'name' => $category->nombre ?? $category->name ?? null,
                        'slug' => $category->slug,
                        'order' => $category->orden ?? null,
                    ];
                })->values(),
                'featured_posts' => $posts->map(fn (Post $post) => $this->transformPostCard($post))->values(),
            ],
        ]);
    }

    public function homePosts(): JsonResponse
    {
        $posts = Post::orderBy('id', 'desc')->limit(4)->get();

        return response()->json([
            'success' => true,
            'data' => $posts->map(fn (Post $post) => $this->transformPostCard($post))->values(),
        ]);
    }

    public function homeCategories(): JsonResponse
    {
        $categories = Category::orderBy('orden', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $categories->map(function (Category $category) {
                return [
                    'id' => $category->id,
                    'name' => $category->nombre ?? $category->name ?? null,
                    'slug' => $category->slug,
                    'order' => $category->orden ?? null,
                ];
            })->values(),
        ]);
    }

    public function services(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                [
                    'title' => 'Armed / Unarmed Security',
                    'slug' => 'armed-unarmed-security',
                ],
                [
                    'title' => 'Access Control',
                    'slug' => 'access-control',
                ],
                [
                    'title' => 'Security Patrol',
                    'slug' => 'security-patrol',
                ],
                [
                    'title' => 'Personal Protection Officers',
                    'slug' => 'personal-protection-officers',
                ],
                [
                    'title' => 'Off-Duty Police Security and Traffic Control',
                    'slug' => 'off-duty-police-security-and-traffic-control',
                ],
            ],
        ]);
    }

    public function industries(): JsonResponse
    {
        $industries = Industry::with('Category')->orderBy('orden', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $industries->map(function (Industry $industry) {
                return [
                    'id' => $industry->id,
                    'name' => $industry->titulo ?? $industry->name ?? null,
                    'slug' => $industry->slug,
                    'summary' => Str::limit(strip_tags($industry->descripcion ?? $industry->contenido ?? ''), 160, '...'),
                    'image_url' => $this->assetUrl($industry->imagen ?? $industry->image ?? null, true),
                    'category' => [
                        'id' => optional($industry->Category)->id,
                        'name' => optional($industry->Category)->nombre ?? optional($industry->Category)->name,
                        'slug' => optional($industry->Category)->slug,
                    ],
                ];
            })->values(),
        ]);
    }

    public function industriesByCategory(string $categorySlug): JsonResponse
    {
        $category = \App\Models\Category::where('slug', $categorySlug)->firstOrFail();
        $industries = Industry::where('category_id', $category->id)->orderBy('orden', 'asc')->get();
        $allCategories = \App\Models\Category::orderBy('orden', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'category' => $this->transformCategory($category),
                'industries' => $industries->map(fn (Industry $ind) => $this->transformIndustryCard($ind))->values(),
                'all_categories' => $allCategories->map(fn ($cat) => $this->transformCategory($cat))->values(),
            ],
        ]);
    }

    public function industryDetail(string $categorySlug, string $industrySlug): JsonResponse
    {
        $category = \App\Models\Category::where('slug', $categorySlug)->firstOrFail();
        $industry = Industry::where('slug', $industrySlug)->firstOrFail();
        $allCategories = \App\Models\Category::orderBy('orden', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'category' => $this->transformCategory($category),
                'industry' => [
                    'id' => $industry->id,
                    'name' => $industry->titulo,
                    'slug' => $industry->slug,
                    'banner_url' => $this->assetUrl($industry->banner, true),
                    'card_url' => $this->assetUrl($industry->card, true),
                    'content_html' => $industry->contenido,
                    'summary' => Str::limit(strip_tags($industry->contenido ?? ''), 160, '...'),
                ],
                'all_categories' => $allCategories->map(fn ($cat) => $this->transformCategory($cat))->values(),
            ],
        ]);
    }

    private function transformCategory(\App\Models\Category $category): array
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'banner_url' => $this->assetUrl($category->banner, true),
            'card_url' => $this->assetUrl($category->card, true),
        ];
    }

    private function transformIndustryCard(Industry $industry): array
    {
        return [
            'id' => $industry->id,
            'name' => $industry->titulo,
            'slug' => $industry->slug,
            'card_url' => $this->assetUrl($industry->card, true),
            'banner_url' => $this->assetUrl($industry->banner, true),
            'summary' => Str::limit(strip_tags($industry->contenido ?? ''), 120, '...'),
        ];
    }

    public function trainingEvents(): JsonResponse
    {
        $events = Event::orderBy('start_date', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $events->map(function (Event $event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'slug' => $event->slug,
                    'start_date' => $event->start_date,
                    'formatted_date' => $event->start_date ? Carbon::parse($event->start_date)->format('M d, Y') : null,
                    'detail_url' => $event->id && $event->slug ? url("/training-calendar/{$event->id}/{$event->slug}") : null,
                ];
            })->values(),
        ]);
    }

    public function blog(): JsonResponse
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $posts->map(fn (Post $post) => $this->transformPostCard($post))->values(),
        ]);
    }

    public function blogDetail(string $slug): JsonResponse
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $related = Post::where('id', '<>', $post->id)->orderBy('id', 'desc')->limit(3)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $post->id,
                'title' => $post->titulo,
                'slug' => $post->slug,
                'summary' => $post->resumen,
                'content_html' => $post->contenido,
                'card_image_url' => $this->assetUrl($post->card, true),
                'banner_image_url' => $this->assetUrl($post->banner, true),
                'published_at' => optional($post->created_at)->toISOString(),
                'formatted_date' => optional($post->created_at)->format('M d, Y'),
                'related_posts' => $related->map(fn (Post $relatedPost) => $this->transformPostCard($relatedPost))->values(),
            ],
        ]);
    }

    public function contact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string', 'min:10'],
            'origen' => ['nullable', 'string', 'max:100'],
        ]);

        $contact = new Contact();
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'] ?? null;
        $contact->message = $validated['message'];
        $contact->origen = $validated['origen'] ?? 'api-home';
        $contact->save();

        $html = $this->buildContactEmailHtml($contact);
        Mail::to(env('MAIL_CONTACT'))->send(new ContactMail(['html' => $html]));

        return response()->json([
            'success' => true,
            'message' => 'Contact request submitted successfully.',
            'data' => [
                'id' => $contact->id,
            ],
        ], 201);
    }

    public function employment(Request $request): JsonResponse
    {
        $request->validate([
            'lastname'         => ['required', 'string', 'max:100'],
            'firstname'        => ['required', 'string', 'max:100'],
            'mi'               => ['required', 'string', 'max:10'],
            'date'             => ['required', 'date'],
            'address'          => ['required', 'string', 'max:255'],
            'apartment'        => ['nullable', 'string', 'max:100'],
            'city'             => ['required', 'string', 'max:100'],
            'state'            => ['required', 'string', 'max:100'],
            'zipcode'          => ['required', 'string', 'max:20'],
            'phone'            => ['required', 'string', 'max:50'],
            'email'            => ['required', 'email', 'max:255'],
            'birthday'         => ['required', 'date'],
            'socialnumber'     => ['required', 'string', 'max:20'],
            'placebirth'       => ['required', 'string', 'max:100'],
            'appliedpay'       => ['required', 'string', 'max:255'],
            'whichshift'       => ['required', 'string'],
            'days'             => ['nullable', 'array'],
            'days.*'           => ['string'],
            'citizen'          => ['required', 'in:yes,no'],
            'authorized'       => ['nullable', 'in:yes,no'],
            'worked'           => ['required', 'in:yes,no'],
            'when'             => ['nullable', 'string', 'max:255'],
            'convicted'        => ['required', 'in:yes,no'],
            'explain1'         => ['nullable', 'string', 'max:500'],
            'indictment'       => ['required', 'in:yes,no'],
            'explain2'         => ['nullable', 'string', 'max:500'],
            'graduatehigh'     => ['required', 'in:yes,no'],
            'hightschool'      => ['nullable', 'string', 'max:255'],
            'highfrom'         => ['nullable', 'date'],
            'hightto'          => ['nullable', 'date'],
            'graduatecollage'  => ['required', 'in:yes,no'],
            'collaganame'      => ['nullable', 'string', 'max:255'],
            'collagefrom'      => ['nullable', 'date'],
            'collageto'        => ['nullable', 'date'],
            'whatmayor'        => ['nullable', 'string', 'max:255'],
            'completed'        => ['nullable', 'string', 'max:255'],
            'activecard'       => ['required', 'in:yes,no'],
            'officer'          => ['nullable', 'string'],
            'firearm'          => ['nullable', 'in:yes,no'],
            'holster'          => ['nullable', 'string'],
            'others'           => ['nullable', 'string', 'max:500'],
            'fullname'         => ['nullable', 'array'],
            'fullname.*'       => ['nullable', 'string', 'max:255'],
            'relationship'     => ['nullable', 'array'],
            'relationship.*'   => ['nullable', 'string', 'max:255'],
            'companyref'       => ['nullable', 'array'],
            'companyref.*'     => ['nullable', 'string', 'max:255'],
            'phoneref'         => ['nullable', 'array'],
            'phoneref.*'       => ['nullable', 'string', 'max:50'],
            'addressreference' => ['nullable', 'array'],
            'addressreference.*' => ['nullable', 'string', 'max:255'],
            'companyprev'      => ['nullable', 'array'],
            'companyprev.*'    => ['nullable', 'string', 'max:255'],
            'phoneemp'         => ['nullable', 'array'],
            'phoneemp.*'       => ['nullable', 'string', 'max:50'],
            'addressempl'      => ['nullable', 'array'],
            'addressempl.*'    => ['nullable', 'string', 'max:255'],
            'supervisor'       => ['nullable', 'array'],
            'supervisor.*'     => ['nullable', 'string', 'max:255'],
            'jobtitle'         => ['nullable', 'array'],
            'jobtitle.*'       => ['nullable', 'string', 'max:255'],
            'starting'         => ['nullable', 'array'],
            'starting.*'       => ['nullable', 'string', 'max:100'],
            'ending'           => ['nullable', 'array'],
            'ending.*'         => ['nullable', 'string', 'max:100'],
            'empfrom'          => ['nullable', 'array'],
            'empfrom.*'        => ['nullable', 'string'],
            'empto'            => ['nullable', 'array'],
            'empto.*'          => ['nullable', 'string'],
            'reason'           => ['nullable', 'array'],
            'reason.*'         => ['nullable', 'string', 'max:255'],
            'references1'      => ['nullable', 'in:yes,no'],
            'references2'      => ['nullable', 'in:yes,no'],
            'references3'      => ['nullable', 'in:yes,no'],
            'branch'           => ['nullable', 'string', 'max:255'],
            'tomilitary'       => ['nullable', 'string'],
            'frommilitary'     => ['nullable', 'string'],
            'rank'             => ['nullable', 'string', 'max:100'],
            'type'             => ['nullable', 'string', 'max:100'],
            'explain'          => ['nullable', 'string', 'max:500'],
            'signature'        => ['required', 'string', 'max:255'],
            'datedisclamer'    => ['required', 'date'],
            'fileid'           => ['nullable', 'array'],
            'fileid.*'         => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:5120'],
            'recaptcha_token'  => ['required', 'string'],
        ]);

        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('CAPTCHA_SECRET'),
            'response' => $request->recaptcha_token,
        ])->object();

        if (!$recaptcha->success || ($recaptcha->score ?? 0) < 0.7) {
            return response()->json([
                'success' => false,
                'message' => 'reCAPTCHA verification failed. Please try again.',
            ], 422);
        }

        $dayMap = ['sunday' => '', 'monday' => '', 'tuesday' => '', 'wednesday' => '', 'thursday' => '', 'friday' => '', 'saturday' => ''];
        foreach (($request->days ?? []) as $day) {
            $map = ['1' => 'sunday', '2' => 'monday', '3' => 'tuesday', '4' => 'wednesday', '5' => 'thursday', '6' => 'friday', '7' => 'saturday'];
            if (isset($map[$day])) {
                $dayMap[$map[$day]] = (int) $day;
            }
        }

        $inf = new Information();
        $inf->lastname    = $request->lastname;
        $inf->firstname   = $request->firstname;
        $inf->mi          = $request->mi;
        $inf->date        = $request->date;
        $inf->address     = $request->address;
        $inf->apartment   = $request->apartment;
        $inf->city        = $request->city;
        $inf->state       = $request->state;
        $inf->zipcode     = $request->zipcode;
        $inf->phone       = $request->phone;
        $inf->email       = $request->email;
        $inf->birthday    = $request->birthday;
        $inf->socialnumber = $request->socialnumber;
        $inf->placebirth  = $request->placebirth;
        $inf->appliedpay  = $request->appliedpay;
        $inf->whichshift  = $request->whichshift;
        $inf->whichday    = serialize($dayMap);
        $inf->citizen     = $request->citizen;
        $inf->authorized  = $request->authorized;
        $inf->worked      = $request->worked;
        $inf->when        = $request->when;
        $inf->convicted   = $request->convicted;
        $inf->explain1    = $request->explain1;
        $inf->indictment  = $request->indictment;
        $inf->explain2    = $request->explain2;
        $inf->save();

        $edu = new Education();
        $edu->graduatehigh   = $request->graduatehigh;
        $edu->hightschool    = $request->hightschool;
        $edu->highfrom       = $request->highfrom ?: null;
        $edu->hightto        = $request->hightto ?: null;
        $edu->graduatecollage = $request->graduatecollage;
        $edu->collaganame    = $request->collaganame;
        $edu->collagefrom    = $request->collagefrom ?: null;
        $edu->collageto      = $request->collageto ?: null;
        $edu->activecard     = $request->activecard;
        $edu->officer        = $request->officer;
        $edu->firearm        = $request->firearm;
        $edu->holster        = $request->holster;
        $edu->others         = $request->others;
        $edu->information_id = $inf->id;
        $edu->save();

        $fullnames = $request->fullname ?? [];
        for ($i = 0; $i < count($fullnames); $i++) {
            if (!empty($fullnames[$i])) {
                $ref = new Reference();
                $ref->fullname          = $fullnames[$i];
                $ref->relationship      = $request->relationship[$i] ?? null;
                $ref->companyref        = $request->companyref[$i] ?? null;
                $ref->phoneref          = $request->phoneref[$i] ?? null;
                $ref->addressreference  = $request->addressreference[$i] ?? null;
                $ref->information_id    = $inf->id;
                $ref->save();
            }
        }

        $companies = $request->companyprev ?? [];
        for ($j = 0; $j < count($companies); $j++) {
            if (!empty($companies[$j])) {
                $refKey = 'references' . ($j + 1);
                $emp = new EmployModel();
                $emp->company        = $companies[$j];
                $emp->phoneemp       = $request->phoneemp[$j] ?? null;
                $emp->addressempl    = $request->addressempl[$j] ?? null;
                $emp->supervisor     = $request->supervisor[$j] ?? null;
                $emp->jobtitle       = $request->jobtitle[$j] ?? null;
                $emp->starting       = $request->starting[$j] ?? null;
                $emp->ending         = $request->ending[$j] ?? null;
                $emp->from           = $request->empfrom[$j] ?? null;
                $emp->to             = $request->empto[$j] ?? null;
                $emp->reason         = $request->reason[$j] ?? null;
                $emp->references     = $request->$refKey ?? null;
                $emp->information_id = $inf->id;
                $emp->save();
            }
        }

        $military = new Military();
        $military->branch        = $request->branch;
        $military->from          = $request->tomilitary ?: null;
        $military->to            = $request->frommilitary ?: null;
        $military->rank          = $request->rank;
        $military->type          = $request->type;
        $military->explain       = $request->explain;
        $military->information_id = $inf->id;
        $military->save();

        $discla = new Disclaimer();
        $discla->signature       = $request->signature;
        $discla->datedisclamer   = $request->datedisclamer;
        $discla->information_id  = $inf->id;
        $discla->save();

        if ($request->hasFile('fileid')) {
            foreach ($request->file('fileid') as $file) {
                $path = Storage::putFile('applied', $file);
                $archivo = new Archivo();
                $archivo->file          = $path;
                $archivo->disclaimer_id = $discla->id;
                $archivo->save();
            }
        }

        Mail::to(env('MAIL_CONTACT'))->send(new EmploymentMail(['html' => 'Applicant information is attached to this email.', 'inf_id' => $inf->id]));

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully.',
            'data'    => ['id' => $inf->id],
        ], 201);
    }

    public function form8850(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'yourname'        => ['required', 'string', 'max:255'],
            'socialnumber'    => ['required', 'string', 'max:50'],
            'address'         => ['required', 'string', 'max:255'],
            'citystate'       => ['required', 'string', 'max:255'],
            'country'         => ['required', 'string', 'max:100'],
            'telephone'       => ['required', 'string', 'max:50'],
            'birthday'        => ['required', 'string', 'max:50'],
            'condicional'     => ['nullable', 'array'],
            'condicional.*'   => ['integer', 'between:1,8'],
            'recaptcha_token' => ['required', 'string'],
        ]);

        $recaptcha = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('CAPTCHA_SECRET'),
            'response' => $validated['recaptcha_token'],
        ])->object();

        if (!$recaptcha->success || ($recaptcha->score ?? 0) < 0.7) {
            return response()->json([
                'success' => false,
                'message' => 'reCAPTCHA verification failed. Please try again.',
            ], 422);
        }

        $form = new Form();
        $form->yourname    = $validated['yourname'];
        $form->socialnumber = $validated['socialnumber'];
        $form->address     = $validated['address'];
        $form->citystate   = $validated['citystate'];
        $form->country     = $validated['country'];
        $form->telephone   = $validated['telephone'];
        $form->birthday    = $validated['birthday'];
        $form->condicional = serialize($validated['condicional'] ?? []);
        $form->save();

        $htmlcode = '<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#ffffff;">'
            . '<tr><td><table cellspacing="0" cellpadding="0" border="0" width="100%">'
            . '<tr><td width="24"></td><td><table cellspacing="0" cellpadding="0" border="0" width="100%">'
            . '<tr><td height="55"></td></tr>'
            . '<tr><td style="font-size:23px;color:#031059;text-transform:uppercase;text-align:center;font-weight:500;line-height:1.7;"><h1>FORM 8850</h1></td></tr>'
            . '<tr><td height="25"></td></tr>'
            . '<tr><td style="font-size:12px;line-height:2;color:#031059;text-align:left;font-family:Arial,Helvetica,sans-serif;"><p>Attach file FORM 8850</p></td></tr>'
            . '<tr><td height="80"></td></tr>'
            . '</table></td><td width="24"></td></tr>'
            . '</table></td></tr></table>';

        Mail::to(env('MAIL_CONTACT'))->send(new Form8850Mail(['html' => $htmlcode, 'form_id' => $form->id]));

        return response()->json([
            'success' => true,
            'message' => 'Form 8850 submitted successfully.',
            'data'    => ['id' => $form->id],
        ], 201);
    }

    public function courses(): JsonResponse
    {
        $courses = Course::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $courses->map(fn (Course $course) => $this->transformCourseCard($course))->values(),
        ]);
    }

    public function courseDetail(string $slug): JsonResponse
    {
        $course = Course::where('slug', $slug)->with('chapters')->firstOrFail();
        $related = Course::where('id', '<>', $course->id)->orderBy('id', 'desc')->limit(3)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $course->id,
                'title' => $course->titulo,
                'subtitle' => $course->subtitulo,
                'summary' => $course->resumen,
                'content_html' => $course->contenido,
                'slug' => $course->slug,
                'banner_url' => $this->assetUrl($course->banner, true),
                'video_url' => $this->assetUrl($course->video, true),
                'price' => $course->precio !== null ? (float) $course->precio : null,
                'level' => $course->nivel,
                'chapters_count' => $course->capitulos !== null ? (int) $course->capitulos : null,
                'audio' => $course->audio,
                'language' => $course->language,
                'available_from' => $course->disponible,
                'formatted_available' => $course->disponible ? Carbon::parse($course->disponible)->format('M d, Y') : null,
                'access_days' => $course->tiempovalido !== null ? (int) $course->tiempovalido : null,
                'instructor' => $course->responsable,
                'chapters' => $course->chapters->sortBy('order')->values()->map(function ($chapter) {
                    return [
                        'id' => $chapter->id,
                        'title' => $chapter->title,
                        'slug' => $chapter->slug,
                        'order' => $chapter->order,
                        'has_video' => !empty($chapter->video),
                        'has_reading' => (bool) $chapter->reading,
                        'has_audio' => (bool) $chapter->audio,
                        'has_quiz' => !empty($chapter->quiz),
                    ];
                }),
                'related_courses' => $related->map(fn (Course $relatedCourse) => $this->transformCourseCard($relatedCourse))->values(),
            ],
        ]);
    }

    private function transformCourseCard(Course $course): array
    {
        return [
            'id' => $course->id,
            'title' => $course->titulo,
            'slug' => $course->slug,
            'summary' => $course->resumen,
            'banner_url' => $this->assetUrl($course->banner, true),
            'price' => $course->precio !== null ? (float) $course->precio : null,
            'level' => $course->nivel,
            'chapters_count' => $course->capitulos !== null ? (int) $course->capitulos : null,
        ];
    }

    private function transformPostCard(Post $post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->titulo,
            'slug' => $post->slug,
            'summary' => Str::limit(strip_tags($post->resumen ?? ''), 100, '...'),
            'card_image_url' => $this->assetUrl($post->card, true),
            'detail_url' => $post->slug ? url("/blog/{$post->slug}") : null,
            'published_at' => optional($post->created_at)->toISOString(),
            'formatted_date' => optional($post->created_at)->format('M d, Y'),
        ];
    }

    private function assetUrl(?string $path, bool $storage = false): ?string
    {
        if (!$path) {
            return null;
        }

        return $storage ? url('/storage/' . ltrim($path, '/')) : url('/' . ltrim($path, '/'));
    }

    private function buildContactEmailHtml(Contact $contact): string
    {
        $title = $contact->origen === 'contact' ? 'CONTACT FORM' : 'GET IN TOUCH FORM';
        $phone = $contact->phone ? 'PHONE:' . e($contact->phone) . '<br>' : '';

        return '
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#ffffff;">
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td width="24"></td>
                                <td>
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr><td height="55"></td></tr>
                                        <tr>
                                            <td style="font-size:23px;color:#031059;text-transform:uppercase;text-align:center;font-weight:500;line-height:1.7;">
                                                <h1>' . $title . '</h1>
                                            </td>
                                        </tr>
                                        <tr><td height="25"></td></tr>
                                        <tr>
                                            <td style="font-size:12px;line-height:2;color:#031059;text-align:left;font-family:Arial,Helvetica,sans-serif;">
                                                NAME:' . e($contact->name) . '<br>
                                                ' . $phone . '
                                                EMAIL:' . e($contact->email) . '<br>
                                                MESSAGE:' . nl2br(e($contact->message)) . '<br>
                                            </td>
                                        </tr>
                                        <tr><td height="80"></td></tr>
                                    </table>
                                </td>
                                <td width="24"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        ';
    }
}
