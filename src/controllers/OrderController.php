<?php
declare(strict_types = 1);
namespace App\controllers;
use App\models\OrderModel;
use App\utils\ObjectContainer;
use App\utils\Response;
use InvalidArgumentException;
use LogicException;
use PDOException;

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
            logger($exception->getMessage());
            logger($exception->getTraceAsString());
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        } catch (InvalidArgumentException) {
            return $this->responseObj->toJson(['status' => 'Invalid Argument Exception']);
        }
    }

    public function getByIdAction(): string
    {
        try {
            $urlPath = ObjectContainer::request()->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidedOrderId = (int)$urlPathData[2];

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
            logger($exception->getMessage());
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
    public function updateAction(): string
    {
        try {
            $requestObj = ObjectContainer::request();

            $urlPath = $requestObj->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidesdOrderId = (int)$urlPathData[2];

            $userProvidedData = $requestObj->getRequestBody();

            $this->orderModel->update($userProvidedOrderId, $userProvidedData);
            return $this->responseObj->setResponseCode(200)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }

    public function patchAction(): string
    {
        try {
            $requestObj = ObjectContainer::request();

            $urlPath = $requestObj->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidedOrderId = (int)$urlPathData[2];

            $userProvidedData = $requestObj->getRequestBody();

            $this->orderModel->update($userProvidedOrderId, $userProvidedData);
            return $this->responseObj->setResponseCode(200)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }

    public function deleteAction(): string
    {
        try {
            $urlPath = ObjectContainer::request()->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidedOrderId = (int)$urlPathData[2];

            $this->orderModel->delete($userProvidedOrderId);
            return $this->responseObj->setResponseCode(200)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}