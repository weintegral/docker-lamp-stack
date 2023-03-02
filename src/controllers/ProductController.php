<?php

declare(strict_types = 1);
namespace App\controllers;
use App\models\ProductModel;
use App\utils\ObjectContainer;
use App\utils\Response;
use InvalidArgumentException;
use LogicException;
use PDOException;
class ProductController
{
    private Response $responseObj;
    private ProductModel $productModel;

    public function __construct()
    {
        $this->responseObj = ObjectContainer::response();
        $this->productModel = ObjectContainer::productModel();
    }

    public function listAction(): string
    {
        try {
            $output = $this->productModel->findAll();
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
            $userProvidedProductId = (string)$urlPathData[2];

            $output = $this->productModel->findById($userProvidedProductId);
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
            $this->productModel->insert($userProvidedData);
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
            $userProvidedProductId = (int)$urlPathData[2];

            $userProvidedData = $requestObj->getRequestBody();

            $this->productModel->update($userProvidedProductId, $userProvidedData);
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
            $userProvidedProductId = (int)$urlPathData[2];

            $userProvidedData = $requestObj->getRequestBody();

            $this->productModel->update($userProvidedProductId, $userProvidedData);
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
            $userProvidedProductId = (int)$urlPathData[2];

            $this->productModel->delete($userProvidedProductId);
            return $this->responseObj->setResponseCode(200)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}