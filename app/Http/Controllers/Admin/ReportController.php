<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Receita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Reports/Index');
    }

    public function receitasPorCozinheiro(Request $request)
    {
        $cozinheiros = User::where('role', 'cozinheiro')->select('id', 'name')->get();

        $receitas = [];
        $cozinheiroNome = null;

        if ($request->has('cozinheiro_id')) {
            if ($request->cozinheiro_id === 'all') {
                $receitas = Receita::with(['categoria', 'cozinheiro'])
                    ->select('id', 'nome', 'categoria_id', 'cozinheiro_id', 'created_at')
                    ->get()
                    ->map(function ($receita) {
                        return [
                            'id'          => $receita->id,
                            'nome'        => $receita->nome,
                            'categoria'   => $receita->categoria->nome ?? 'Sem categoria',
                            'data'        => $receita->created_at->format('d/m/Y'),
                            'cozinheiro'  => $receita->cozinheiro->name ?? 'Desconhecido',
                        ];
                    });

                $cozinheiroNome = 'Todos os Cozinheiros';
            } else {
                $cozinheiro = User::find($request->cozinheiro_id);
                $cozinheiroNome = $cozinheiro?->name ?? 'Desconhecido';

                $receitas = Receita::with('categoria')
                    ->where('cozinheiro_id', $request->cozinheiro_id)
                    ->select('id', 'nome', 'categoria_id', 'created_at')
                    ->get()
                    ->map(function ($receita) {
                        return [
                            'id'        => $receita->id,
                            'nome'      => $receita->nome,
                            'categoria' => $receita->categoria->nome ?? 'Sem categoria',
                            'data'      => $receita->created_at->format('d/m/Y'),
                        ];
                    });
            }

            if ($request->has('export') && $request->export === 'pdf') {
                $pdf = Pdf::loadView('pdf.receitas_por_cozinheiro', [
                    'receitas'   => $receitas,
                    'cozinheiro' => $cozinheiroNome
                ]);

                return $pdf->download('receitas_por_cozinheiro.pdf');
            }
        }

        return Inertia::render('Admin/Reports/ReceitasPorCozinheiro', [
            'cozinheiros'   => $cozinheiros,
            'receitas'      => $receitas,
            'selectedChef'  => $request->cozinheiro_id ?? null
        ]);
    }
}
