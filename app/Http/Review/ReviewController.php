<?php

namespace App\Http\Review;

use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * The review repository instance.
     *
     * @var ReviewRepository
     */
    protected $reviews;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReviewRepository $reviews)
    {
        $this->middleware('auth');
        $this->reviews = $reviews;
    }

    /**
     * Display a list of all reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = $this->reviews->getAll();

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Display a form to create a new review.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Create a new review.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->reviews->create($request->all());

        return redirect('/reviews');
    }

    /**
     * Display a form to edit a review.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = $this->reviews->find($id);

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update a review.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->reviews->update($request->all(), $id);

        return redirect('/reviews');
    }
}
