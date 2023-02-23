<?php
declare(strict_types = 1);

class OrderController
{
    private Response $responseObj;
    private OrderModel $orderModel;

    public function __construct()
    {
        $this->responseObj = ObjectContainer::response();
        $this->orderModel = ObjectContainer::orderModel();
    }

    public function listAction(): string
    {
        try {
            $output = $this->orderModel->findAll();
            return $this->responseObj->toJson($output);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        } catch (InvalidArgumentException) {
            return $this->responseObj->toJson(['status' => 'Invalid Argument Exception']);
        }
    }

    public function getByIdAction(): string
    {
        try {
            $urlPath= ObjectContainer::request()->getRequestPath();
            $urlPathData = explode( '/', $urlPath);
            $userProvidedOrderId =(int)$urlPathData[2];

            $output = $this->orderModel->findById($userProvidedOrderId);
            return $this->responseObj->toJson($output);
        } catch (PDOException) {
            return $this->responseObj->toJson(['status' => 'Database issue']);
        } catch (LogicException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }

    public function createAction(): string
    {
        try {
            $userProvidedData = ObjectContainer::request()->getRequestBody();
            $this->orderModel->insert($userProvidedData);
            return $this->responseObj->setResponseCode(201)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}