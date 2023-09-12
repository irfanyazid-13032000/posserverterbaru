<table class="checkout__total--table mb-5">
                            
                            <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total : </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">Rp. {{number_format($total_cart_price)}}</td>
                                </tr>
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Customer Money : </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">Rp. {{number_format($uang_customer)}}</td>
                                </tr>
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Change : </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">Rp. {{number_format($uang_customer - $total_cart_price)}}</td>
                                </tr>
                            </tfoot>
                        </table>

