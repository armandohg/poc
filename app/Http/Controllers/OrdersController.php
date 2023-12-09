<?php

namespace App\Http\Controllers;

use App\View\Components\Uxmal\Ui\Screen;
use App\View\Components\Uxmal\Ui\Row;
use App\View\Components\Uxmal\Ui\Column;
use App\View\Components\Uxmal\Ui\Card;
use App\View\Components\Uxmal\Ui\Button;

class OrdersController extends Controller
{
    public function index(): Screen
    {
        return Screen::make('orders')
            ->background('light')
            ->mainContent(
                Card::make('clientOrder')
                    ->header('Pedido #1234')
                    ->title('Cliente: Juan Perez')
                    ->body(
                        Row::make()
                            ->content([
                                Column::make('orderDate')
                                    ->content('Fecha de pedido')
                                    ->align('center'),
                                Column::make('orderDeliveryDate')
                                    ->content('Fecha de entrega')
                                    ->align('center'),
                                Column::make('orderPaymentDate')
                                    ->content('Fecha de pago')
                                    ->align('center'),
                            ])
                    )
                    ->footer(
                        Row::make()
                            ->content([
                                Column::make('actions')
                                    ->content(
                                        Button::make('Aceptar')
                                            ->label('Aceptar')
                                            ->icon('check')
                                            ->color('secondary')
                                            ->type('submit')
                                    )
                                    ->align('right'),
                            ])
                    )
            );
    }
}
