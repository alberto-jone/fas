@if ($total_pages > 1)
    {{-- Verifica se o número total de páginas é maior que 1 antes de exibir a navegação de páginas --}}
    <nav class="pagination" role="navigation" aria-label="Pagination Navigation">
        <ul>
            {{-- Loop para gerar os links de navegação para cada página --}}
            @for ($i = 1; $i <= $total_pages; $i++)
                <li>
                    {{-- Link para a página, com parâmetros de consulta para term, show e from --}}
                    <a href="{{ url('?term=' . $term . '&show=' . $show . '&from=' . (($i - 1) * $show)) }}"
                       class="btn @if ($i == $current_page) active @endif"
                       @if ($i == $current_page) aria-current="true" @endif>
                        {{-- Exibe o número da página atual --}}
                        {{ $i }}
                    </a>
                </li>
            @endfor
        </ul>
    </nav>
@endif

{{--
====================================================================
DOCUMENTAÇÃO INTERNA — PAGINAÇÃO
Autor: Alberto Jone João
Email: alberto.jone.joao@gmail.com
Data: 09 de Abril de 2025
Hora: 14h05
====================================================================

1. Estrutura e Funcionalidade
   - Este trecho de código é responsável por exibir a navegação de páginas (paginação) em uma interface, caso haja mais de uma página de resultados.
   - A estrutura do código é um loop que gera um conjunto de links para navegar entre as páginas.

2. Lógica de Funcionamento
   - **Verificação de Páginas:** O código começa verificando se o número total de páginas (`$total_pages`) é maior que 1. Se houver apenas uma página, a navegação não será exibida.
   - **Loop de Navegação:** Para cada página (de 1 até `$total_pages`), é gerado um link que leva o usuário para a página correspondente. A URL do link inclui os parâmetros `term`, `show`, e `from`, que controlam a busca, a quantidade de itens por página e o deslocamento de dados.

3. Indicador de Página Ativa
   - **Classe `active`:** A página atual é destacada usando a classe CSS `active`, aplicada ao link da página atual (`$i == $current_page`).
   - **Atributo `aria-current`:** O atributo `aria-current="true"` é adicionado ao link da página atual para melhorar a acessibilidade, indicando a página ativa para leitores de tela.

4. Sugestões de Melhoria
   - **Primeira/Última Página:** Poderia ser interessante adicionar links rápidos para a primeira e última página, além de uma navegação para página anterior/próxima.
   - **Limitar Páginas Visíveis:** Para resultados com muitas páginas, poderia ser interessante limitar a quantidade de páginas exibidas e adicionar uma navegação para avançar nas páginas.

5. Observações
   - A navegação de páginas é essencial quando há um grande número de resultados, permitindo que o usuário navegue entre eles de forma intuitiva e acessível.
   - O código utiliza `old()` e parâmetros de consulta para garantir que a navegação mantenha o estado correto quando o usuário altera os filtros de busca (como `term`, `show` e `from`).

--}}
