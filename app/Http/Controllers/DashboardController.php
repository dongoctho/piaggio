<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\RepositoryInterface\CategoryRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\OrderRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\OrderDetailRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\ProductRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Equal;

class DashboardController extends Controller
{
    protected $categoryRepository;
    protected $orderRepository;
    protected $productRepository;
    protected $userRepository;
    protected $orderDetailRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface,
        OrderRepositoryInterface $orderRepositoryInterface,
        OrderDetailRepositoryInterface $orderDetailRepositoryInterface,
        ProductRepositoryInterface $productRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface
    ) {
        $this->categoryRepository = $categoryRepositoryInterface;
        $this->orderRepository = $orderRepositoryInterface;
        $this->productRepository = $productRepositoryInterface;
        $this->orderDetailRepository = $orderDetailRepositoryInterface;
        $this->userRepository = $userRepositoryInterface;
    }

    // show dashboard page
    public function dashboard()
    {
        $year =  Carbon::now()->year;
        $check_dashboard = true;
        $sumSale1 = $this->orderRepository->sumSale('01', $year)->toArray();
        $sumSale2 = $this->orderRepository->sumSale('02', $year)->toArray();
        $sumSale3 = $this->orderRepository->sumSale('03', $year)->toArray();
        $sumSale4 = $this->orderRepository->sumSale('04', $year)->toArray();
        $sumSale5 = $this->orderRepository->sumSale('05', $year)->toArray();
        $sumSale6 = $this->orderRepository->sumSale('06', $year)->toArray();
        $sumSale7 = $this->orderRepository->sumSale('07', $year)->toArray();
        $sumSale8 = $this->orderRepository->sumSale('08', $year)->toArray();
        $sumSale9 = $this->orderRepository->sumSale('09', $year)->toArray();
        $sumSale10 = $this->orderRepository->sumSale('10', $year)->toArray();
        $sumSale11 = $this->orderRepository->sumSale('11', $year)->toArray();
        $sumSale12 = $this->orderRepository->sumSale('12', $year)->toArray();

        $status0 = $this->orderRepository->statusOrder("0")->toArray();
        $status1 = $this->orderRepository->statusOrder("1")->toArray();
        $status2 = $this->orderRepository->statusOrder("2")->toArray();
        $status3 = $this->orderRepository->statusOrder("3")->toArray();
        $status4 = $this->orderRepository->statusOrder("4")->toArray();

        $countproduct = $this->productRepository->countProduct()->toArray();

        $sumPrice = $this->orderRepository->sumPrice();

        $newUser = $this->userRepository->newUser();

        return view('admin.statistical', compact('newUser','sumPrice','countproduct','check_dashboard','sumSale1','sumSale2','sumSale3','sumSale4','sumSale5','sumSale6','sumSale7','sumSale8','sumSale9','sumSale10','sumSale11','sumSale12', 'status0', 'status1', 'status2', 'status3', 'status4'));
    }

    public function saleDay()
    {
        $yesterday = Carbon::yesterday('Asia/Ho_Chi_Minh')->toDateString();
        $check_dashboard = true;
        $status0 = $this->orderRepository->statusOrderDay("0", $yesterday)->toArray();
        $status1 = $this->orderRepository->statusOrderDay("1", $yesterday)->toArray();
        $status2 = $this->orderRepository->statusOrderDay("2", $yesterday)->toArray();
        $status3 = $this->orderRepository->statusOrderDay("3", $yesterday)->toArray();
        $status4 = $this->orderRepository->statusOrderDay("4", $yesterday)->toArray();
        $countproduct = $this->productRepository->countProduct()->toArray();
        $sumPrice = $this->orderRepository->sumPrice();
        $newUser = $this->userRepository->newUser();
        $sumsaleday = $this->orderRepository->sumSaleDay($yesterday);

        return view('admin.statistical_day', compact('newUser','sumPrice','countproduct','check_dashboard', 'status0', 'status1', 'status2', 'status3', 'status4', 'sumsaleday'));
    }

    public function findOrder(Request $request)
    {
        $oldFindFirst = "";
        $oldFindEnd = "";
        $column = [
            'orders.id',
            'users.id  as user_id',
            'vouchers.name as voucher_name',
            'users.name as user_name',
            'orders.phone',
            'orders.name',
            'orders.address',
            'orders.price',
            'orders.status',
            'orders.created_at'
        ];
        $orders = $this->orderRepository->getOrderByCondition("", $column);
        if (isset($request->first_date) && empty($request->end_date)) {
            $first_date = $request->first_date;
            $oldFindFirst = $first_date;
            $orders = $this->orderRepository->getFindOrder($first_date, "", $column);
        } else if (isset($request->end_date) && empty($request->first_date)) {
            $end_date = $request->end_date;
            $oldFindEnd = $end_date;
            $orders = $this->orderRepository->getFindOrder("", $end_date, $column);
        } else if (isset($request->first_date) && isset($request->end_date)) {
            $first_date = $request->first_date;
            $end_date = $request->end_date;
            $oldFindFirst = $first_date;
            $oldFindEnd = $end_date;
            $orders = $this->orderRepository->getFindOrder($first_date, $end_date, $column);
        }

        return view('admin.find_order', compact('orders', 'oldFindFirst', 'oldFindEnd'));
    }

    public function findOrderDetail(int $user_id, int $id)
    {
        $column = [
            'orders_detail.*',
            'products.name'
        ];
        $order_details = $this->orderDetailRepository->getOrderDetail($user_id, $id, $column);
        $order = $this->orderRepository->findOrder($id);

        return view('admin.find_order_detail', compact('order_details', 'order'));
    }
}
