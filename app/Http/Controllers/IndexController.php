<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\RepositoryInterface\ProductRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\ManufactureRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\StorageRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\CartRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\CartDetailRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use App\Http\Requests\EditInforFormRequest;
use Illuminate\Http\Request;
use App\Services\ImageService;

class IndexController extends Controller
{
    protected $userRepository;
    protected $productRepository;
    protected $storageRepository;
    protected $categoryRepository;
    protected $manufactureRepository;
    protected $cartRepository;
    protected $cartDetailRepository;
    protected $image_service;

    public function __construct (
        ProductRepositoryInterface $productRepositoryInterface,
        StorageRepositoryInterface $storageRepositoryInterface,
        CategoryRepositoryInterface $categoryRepositoryInterface,
        ManufactureRepositoryInterface $manufactureRepositoryInterface,
        CartRepositoryInterface $cartRepositoryInterface,
        CartDetailRepositoryInterface $cartDetailRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface,
        ImageService $imageService
    ) {
        $this->productRepository = $productRepositoryInterface;
        $this->storageRepository = $storageRepositoryInterface;
        $this->categoryRepository = $categoryRepositoryInterface;
        $this->manufactureRepository = $manufactureRepositoryInterface;
        $this->cartRepository = $cartRepositoryInterface;
        $this->cartDetailRepository = $cartDetailRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
        $this->image_service = $imageService;
    }

    public function fleet()
    {
        return view('client.fleet');
    }

    public function blog()
    {
        return view('client.blog-posts');
    }

    public function blogDetail()
    {
        return view('client.blog-post-details');
    }

    public function aboutUs()
    {
        return view('client.about-us');
    }

    public function team()
    {
        return view('client.team');
    }

    public function testimonials()
    {
        return view('client.testimonials');
    }

    public function terms()
    {
        return view('client.terms');
    }

    // show information user page
    public function information()
    {
        $user = auth()->user();
        $count = $this->cartRepository->countProductInCart($user->id);

        return view('client.information', compact('count', 'user'));
    }

    // show edit information user page
    public function editInformation()
    {
        $user = auth()->user();
        $count = $this->cartRepository->countProductInCart($user->id);

        return view('client.edit_information', compact('count', 'user'));
    }

    // edit information user
    public function editInfor(EditInforFormRequest $request)
    {
        $user = auth()->user();
        if ( $request->avatar == null )
        {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'address' => $request->address
            ];

            $this->userRepository->update($user->id, $data);

            return redirect()->route('infor_index');
        } else {
            $image = $this->image_service->image($request->avatar);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'avatar' => $image
            ];

            $this->userRepository->update($user->id, $data);

            return redirect()->route('infor_index');
        }
    }

    // show  index client
    public function indexClient()
    {
        $oldSearch = "";
        $products = $this->storageRepository->getProductSale();
        $user = auth()->user();
        $count = 0;

        if ( isset($user) ) {
            $count = $this->cartRepository->countProductInCart($user->id);
        }

        return view('client.index', compact('products', 'user', 'count'));
    }

    // show index contact
    public function indexContact()
    {
        $user = auth()->user();
        $products = $this->productRepository->getAll();
        $count = 0;

        if ( isset($user) ) {
            $count = $this->cartRepository->countProductInCart($user->id);
        }

        return view('client.contact', compact('products', 'user', 'count'));
    }

}
