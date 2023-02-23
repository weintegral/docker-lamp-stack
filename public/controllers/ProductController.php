<?php

declare(strict_types = 1);
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
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}