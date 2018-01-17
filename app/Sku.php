<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sku', 'price', 'size', 'color', 'product_id'];

    /**
     * @var array
     */
    private static $sku_attributes = ['size', 'color', 'product_id'];

    /**
     * @var string
     */
    protected $table = 'sku';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Create sku for product by id + short_size + short_color
     *
     * @return $this
     */
    public function createSku()
    {
        if (!($this->size && $this->color && $this->product_id))
            return $this;

        $short_size = preg_replace("/[^0-9]/", '', $this->size) ?? strtoupper(substr($this->size, 0, 2));
        $short_color = strtoupper(substr($this->color, 0, 2));
        $this->sku = $this->product_id . '-' . $short_size . $short_color;
        $i = 0;
        while ($existed_sku = Sku::where('sku', $this->sku)->first()) {
            if (    $existed_sku->color      == $this->color
                &&  $existed_sku->size       == $this->size
                &&  $existed_sku->product_id == $this->product_id) {
                return null;
            }

            $this->sku .= '.' . $i++;
        }
        $this->save();
        return $this;
    }

    /**
     * If set attr from sku_attributes -> auto update sku
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        parent::__set($key,$value);

        if (in_array($key, $this::$sku_attributes))
            $this->createSku();
    }
}
