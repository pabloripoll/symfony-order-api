<?php
namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Order implements \JsonSerializable
{
    use \App\Service\Timestamps;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_price", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $totalPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="products", type="text", length=0, nullable=true)
     */
    private $products;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPrice(): ?string
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(?string $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getProducts(): ?string
    {
        return $this->products;
    }

    public function setProducts(?string $products): self
    {
        $this->products = $products;

        return $this;
    }

    // JSON
    public function jsonSerialize()
    {
        return [
            'id'    => $this->id,            
            'total_price' => $this->totalPrice,
            'products'  => $this->products,
        ];
    }

}
