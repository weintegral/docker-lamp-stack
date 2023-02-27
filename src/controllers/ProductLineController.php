<?php

declare(strict_types = 1);
namespace App\controllers;

class ProductLineController
{
    private Response $responseObj;
    private ProductLineModel $productLineModel;

    public function __construct()
    {
        $this->responseObj = ObjectContainer::response();
        $this->productLineModel = ObjectContainer::productLineModel();
    }

    public function listAction(): string
    {
        try {
            $output = $this->productLineModel->findAll();
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
            $urlPath = ObjectContainer::request()->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidedProductLineId = (string)$urlPathData[2];

            $output = $this->productLineModel->findById($userProvidedProductLineId);
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
            $this->productLineModel->insert($userProvidedData);
            return $this->responseObj->setResponseCode(201)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
    public function updateAction(): string
    {
        try {
            $requestObj = ObjectContainer::request();

            $urlPath = $requestObj->getRequestPath();
            $urlPathData = explode('/', $urlPath);
            $userProvidedProductLineId = (int)$urlPathData[2];

            $userProvidedData = $requestObj->getRequestBody();

            $this->productLineModel->update($userProvidedProductLineId, $userProvidedData);
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
            $userProvidedProductLineId = (int)$urlPathData[2];

            $this->productLineModel->delete($userProvidedProductLineId);
            return $this->responseObj->setResponseCode(200)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}