<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
use App\Keranjang;
use Validator;
use App\Order;
use App\OrderItem;
use App\OrderStatus;
use Session;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{

   public function getCart()
   {
       if (!Session::has('keranjang')) {
           return response()->json([
               'message' => 'keranjang kosong'
           ]);
       }
       $cart = Session::get('keranjang');
       $keranjang = new Keranjang($cart);
       return response()->json([
        'products' => $keranjang->items,
        'total harga' => $keranjang->totalPrice,
    ]);
   }

    public function addToCart(Request $request)
    {
        $userId = $request->input('id_user');
        $requestParams = [
            'id_user' => $userId,
        ];

        if(is_null($userId)){
            return  response()->json([
                'message' => 'Missing required paramter id_user',    
              ]);
        }

        $currentUser = User::find($userId);
        if(is_null($currentUser)){
            return  response()->json([
                'message' => 'User not found!',    
              ]);
        }



        $currentOrder = Order::where(['id_user' => $userId, 'order_status_id' => 1])->first();
        if(is_null($currentOrder)){
            $currentOrder = new Order();
            $currentOrder->id_user = $userId;
            $currentOrder->created_at = date("Y-m-d H:i:s");
            $currentOrder->total = 0;
            $currentOrder->bayar = 0;
            $currentOrder->name = 'admin';
            $currentOrder->order_status_id = 1; //order baru / berjalan
            try{
                $currentOrder->save();
            }catch (Exception $e){
                return  response()->json([
                    'message' => 'Order could not created!',    
                  ]);
            }
        }



        /**
         * @proses add to cart
         **/
        $barang = $request->input('id_barang');
        if(is_null($barang)){
            return  response()->json([
                'message' => 'Missing required paramter id_barang',    
              ]);
        }

        $requestParams["id_barang"] = $barang;

        $barangItem = Barang::find($barang);
        if(is_null($barangItem)){
            return  response()->json([
                'message' => 'Climbing tool item not found!',    
              ]);
        }

        $orderItem = OrderItem::where(['orders_id' => $currentOrder->id, 'id_barang' => $barang])->first();
        if(is_null($orderItem)){

            if(($barangItem->stock - 1) < 0)
            {
                return  response()->json([
                    'message' => 'CLimbing tool item out of stock!',    
                  ]);
            }

            $orderItem = new OrderItem();
            $orderItem->quantity = 1;
            $orderItem->id_barang = $barang;
            $orderItem->orders_id = $currentOrder->id;

            try{
                $orderItem->save();

            }catch (\Exception $e){
                return  response()->json([
                    'message' => 'Order item couldnot created!',    
                  ]);
            }

        }else{
            $orderItem->quantity += 1;

            if(($barangItem->stock - $orderItem->quantity) < 0)
            {
                return  response()->json([
                    'message' => 'Climbing tool item out of stock!',    
                  ]);
            }

            try{
                $orderItem->save();
            }catch (\Exception $e){
                return  response()->json([
                    'message' => 'Order item couldnot added!',    
                  ]);
            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Success adding barang tool item to cart!',
        ];


        return response()->json($params);
    }

    public function listProductInCart(Request $request, $id_user)
    {
        $requestParams = [
            'id_user' => $id_user
        ];
        $activeUser = User::find($id_user);
        if(is_null($activeUser)){
            return  response()->json([
                'message' =>'User not found!',    
              ]);
        }

        $orders = Order::where(['id_user' => $id_user, 'order_status_id' => 1])->get();
        $data = [];
        foreach ($orders as $num => $item)
        {
            foreach ($item->getOrderItems as $no => $orderItem){

                $data[] = [
                    'order_item_id' => $orderItem->id,
                    'quantity' => $orderItem->order_item_quantity,
                    'price' => $orderItem->getBarang->price,
                ];
            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Success get product in cart!',
            'data' => $data
        ];


        return response()->json($params);

    }

    
}
