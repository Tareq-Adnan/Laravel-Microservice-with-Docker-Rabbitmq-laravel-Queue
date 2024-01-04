<?php

namespace App\Http\Controllers;

use App\Jobs\OrderCreated;
use App\Models\Order;
use App\Services\RabbitMQService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    protected Model $model;
    protected RabbitMQService $services;

    public function __construct(Order $model, RabbitMQService $service)
    {
        $this->model = $model;
        $this->services=$service;
    }

    public function store(Request $request)
    {
        $order = $this->model->create($request->all());
        $this->services->publish(json_encode($order));
        return response($order, Response::HTTP_CREATED);
    }
}
