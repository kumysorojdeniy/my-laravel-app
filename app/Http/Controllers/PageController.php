<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'works' => array_slice($this->portfolioItems(), 0, 6),
            'steps' => [
                ['title' => 'Заявка', 'text' => 'Отправляете файл модели и выбираете опции в форме заказа.'],
                ['title' => 'Расчёт', 'text' => 'Согласовываем цену и сроки, при необходимости консультируем по подготовке модели.'],
                ['title' => 'Печать', 'text' => 'Печатаем на фотополимерном или FDM принтере, при заказе — красим и собираем.'],
                ['title' => 'Выдача', 'text' => 'Аккуратно упаковываем и передаём удобным способом, включая бережную доставку.'],
            ],
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'groups' => [
                [
                    'slug' => 'resin',
                    'title' => 'Фотополимерная печать',
                    'description' => 'Детализация без компромиссов: идеально для миниатюр 28–54 мм, бюстов и мелких декоративных элементов.',
                    'items' => [
                        ['name' => 'Миниатюры 28–32 мм', 'price' => 'от 150 ₽'],
                        ['name' => 'Бюсты и оверсайз (до 12 см)', 'price' => 'от 350 ₽'],
                        ['name' => 'Крупные модели (от 12 см)', 'price' => 'от 800 ₽'],
                        ['name' => 'Раскрытие поддержек и чистка', 'price' => '30% от стоимости'],
                    ],
                ],
                [
                    'slug' => 'fdm',
                    'title' => 'FDM печать',
                    'description' => 'Крупные и функциональные детали: террейн, интерьеры, прототипы и механика с высокой прочностью.',
                    'items' => [
                        ['name' => 'Террейн и декорации', 'price' => 'от 8 ₽/грамм'],
                        ['name' => 'Функциональные прототипы', 'price' => 'от 10 ₽/грамм'],
                        ['name' => 'Крупные модели (до 40 см)', 'price' => 'индивидуально'],
                        ['name' => 'Экспозиция вниз не требуется', 'price' => 'поддержки включены'],
                    ],
                ],
                [
                    'slug' => 'painting',
                    'title' => 'Художественный покрас миниатюр',
                    'description' => 'От базовых схем до уровня «best in show»: NMM, OSL, свободная рука, имитация материалов.',
                    'items' => [
                        ['name' => 'Столовый уровень (Tabletop)', 'price' => 'от 300 ₽/шт'],
                        ['name' => 'Прокачка (Display / Semi-advanced)', 'price' => 'от 900 ₽/шт'],
                        ['name' => 'Покрас бюстов (1–3 уровня сложности)', 'price' => 'от 1500 ₽/шт'],
                        ['name' => 'Возврат в стоковое состояние (stripping)', 'price' => 'от 200 ₽/шт'],
                    ],
                ],
                [
                    'slug' => 'modeling',
                    'title' => '3D-моделирование',
                    'description' => 'Создадим модель по референсу: уникальные персонажи, модификации и подготовка файлов к печати.',
                    'items' => [
                        ['name' => 'Готовая модель под печать', 'price' => 'от 1000 ₽'],
                        ['name' => 'Ретопология и ремонт сетки (mesh repair)', 'price' => 'от 300 ₽'],
                        ['name' => 'Модификация и детализация', 'price' => 'от 500 ₽'],
                        ['name' => 'Подготовка к печати (поддержки, hollowing)', 'price' => 'от 200 ₽'],
                    ],
                ],
            ],
        ]);
    }

    public function portfolio(Request $request): View
    {
        $allowed = ['wargames', 'busts', 'terrain'];
        $category = $request->query('category');
        $category = in_array($category, $allowed, true) ? $category : null;

        $works = $category
            ? array_values(array_filter($this->portfolioItems(), fn ($work) => $work['category'] === $category))
            : $this->portfolioItems();

        return view('pages.portfolio', [
            'works' => $works,
            'categories' => [
                'wargames' => 'Настольные игры и варгеймы',
                'busts' => 'Бюсты',
                'terrain' => 'Террейн',
            ],
            'activeCategory' => $category,
        ]);
    }

    public function terms(): View
    {
        return view('pages.terms');
    }

    public function contacts(): View
    {
        return view('pages.contacts');
    }

    /**
     * Отдаёт работы из базы; если портфолио ещё пустое — демо-данные.
     *
     * @return array<int, array{title: string, category: string, categoryLabel: string, description: string, image: ?string, tone: ?string}>
     */
    private function portfolioItems(): array
    {
        $items = PortfolioItem::query()->orderBy('sort_order')->orderBy('id')->get();

        if ($items->isEmpty()) {
            return $this->demoWorks();
        }

        return $items->map(fn (PortfolioItem $item): array => [
            'title' => $item->title,
            'category' => $item->category->value,
            'categoryLabel' => $item->category->getLabel(),
            'description' => $item->description ?? '',
            'image' => $item->image ? Storage::disk('public')->url($item->image) : null,
            'tone' => $item->image ? null : 'from-zinc-600 to-zinc-800',
        ])->all();
    }

    /**
     * @return array<int, array{title: string, category: string, categoryLabel: string, description: string, image: ?string, tone: string}>
     */
    private function demoWorks(): array
    {
        $categories = ['wargames' => 'Настольные игры и варгеймы', 'busts' => 'Бюсты', 'terrain' => 'Террейн'];

        return array_map(
            fn ($tone, $title, $category, $description) => [
                'title' => $title,
                'category' => $category,
                'categoryLabel' => $categories[$category],
                'description' => $description,
                'image' => null,
                'tone' => $tone,
            ],
            [
                'from-sky-500 to-indigo-600',
                'from-amber-500 to-orange-600',
                'from-rose-500 to-pink-600',
                'from-emerald-500 to-teal-600',
                'from-stone-500 to-neutral-700',
                'from-zinc-500 to-slate-700',
                'from-violet-500 to-purple-600',
                'from-fuchsia-500 to-purple-700',
                'from-lime-500 to-green-600',
            ],
            [
                'Отряд «Space Marines» 28 мм',
                'Некрон-лорд, оверсайз',
                'Бюст «Варварин» 1:6',
                'Бюст «Драконий страж»',
                'Замковый террейн 28 мм',
                'Разрушенный город',
                'Ксенос-пехота',
                'Бюст «Падший принц»',
                'Лесная поляна',
            ],
            [
                'wargames',
                'wargames',
                'busts',
                'busts',
                'terrain',
                'terrain',
                'wargames',
                'busts',
                'terrain',
            ],
            [
                'Фотополимерная печать и покрас уровня «tabletop+».',
                'Детализация под обзорные кадры, NMM по металу.',
                'Уровень Display: имитация кожи, металла и ткани.',
                'Работа с битым светом и свободная рука на щите.',
                'FDM-печать крупного модульного террейна.',
                'Модульные руины с усилением и покраской под камень.',
                'Партия из 30 миниатюр: печать и быстрый покрас.',
                'Сложный покрас лака и свободная рука.',
                'Террейн для зон: деревья, камни и валуны.',
            ],
        );
    }
}
