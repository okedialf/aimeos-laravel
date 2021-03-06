<?php

/**
 * @license MIT, http://opensource.org/licenses/MIT
 * @copyright Aimeos (aimeos.org), 2016
 * @package laravel
 * @subpackage Controller
 */


namespace Aimeos\Shop\Controller;

use Aimeos\Shop\Facades\Shop;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;


/**
 * Aimeos controller for supplier related functionality.
 *
 * @package laravel
 * @subpackage Controller
 */
class SupplierController extends Controller
{
	/**
	 * Returns the html for the supplier detail page.
	 *
	 * @return \Illuminate\Http\Response Response object with output and headers
	 */
	public function detailAction()
	{
		foreach( app( 'config' )->get( 'shop.page.supplier-detail' ) as $name )
		{
			$params['aiheader'][$name] = Shop::get( $name )->getHeader();
			$params['aibody'][$name] = Shop::get( $name )->getBody();
		}

		return Response::view( 'shop::supplier.detail', $params )
			->header( 'Cache-Control', 'private, max-age=10' );
	}
}