<?php

/**
 * Art Impressa — Central Configuration
 *
 * PHP  8.3+
 *
 * Contains:
 *  • Site-wide constants
 *  • Enums        (PHP 8.1+)
 *  • Readonly DTOs (PHP 8.2+)
 *  • Helper functions
 *  • All content data arrays consumed by view components
 */

declare(strict_types=1);
// CONSTANTS
const SITE_NAME = 'Art Impressa';
const SITE_TAGLINE = 'Gráfica e Editora LTDA';
const SITE_SUBTITLE = 'Impressão & Design';
const SITE_URL = 'https://graficaartimpressa.com.br/';
const SITE_DESCRIPTION = 'Somos uma empresa com mais de 20 anos de experiência no mercado gráfico, atuando desde 2004. Visando atender empresas de diferentes portes e segmentos, trazendo inovação e personalidade em seus produtos, transformando suas ideias em arte.';
const SITE_KEYWORDS  = 'gráfica São Paulo ,grafica, art impresssa, graficas, impressão offset São Paulo, cartões de visita, banners, embalagens personalizadas, grande formato, impressão digital, materiais promocionais, Art Impressa, flyers ';
const SITE_OG_IMAGE = '';
const SITE_PHONE = '+55-11-99855-7757';
const SITE_PHONE_LABEL = '(11) 99855-7757';
const SITE_EMAIL = 'eduardoartgraf@uol.com.br';
const SITE_ADDRESS = 'Avenida Jaguaribe, 353 - São Paulo - SP 06050-020';
const FOUNDING_YEAR = 2004;
const COLOR_GOLD = '#C9973B';
const COLOR_INK = '#0D0D0D';
const COLOR_WA  = '#25D366';
/** WhatsApp brand SVG path — shared across navbar, contact and footer. */
const WA_SVG_PATH = 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z';
// ENUMS
enum ProductBadge: string
{
    case Popular = 'Popular';
    case Premium = 'Premium';
    case Novo    = 'Novo';

    /** Returns the Tailwind utility classes for the badge pill. */
    public function cssClass(): string
    {
        return match ($this) {
            self::Popular => 'bg-[#C9973B] text-[#0D0D0D]',
            self::Premium => 'bg-white/10 text-white border border-white/20',
            self::Novo    => 'bg-emerald-500 text-white',
        };
    }
}
// READONLY DATA CLASSES 
readonly class NavLink
{
    public function __construct(
        public string $label,
        public string $href,
    ) {}
}
readonly class DropdownContact
{
    public function __construct(
        public string $svgHtml,      // pre-rendered full <svg>…</svg>
        public string $iconBgClass,  // Tailwind class for the icon wrapper bg
        public string $label,
        public string $value,
        public string $href,
        public bool   $external = false,
    ) {}
}
readonly class HeroSlide
{
    public function __construct(
        public string $image,
        public string $alt,
        public string $tag,
        public string $title,    // Use \n for line-break in the title
        public string $subtitle,
        public int    $index,    // 0-based Alpine index
    ) {}
}
readonly class Highlight
{
    public function __construct(
        public string $svgInner,  // Inner SVG elements — no <svg> wrapper
        public string $label,
        public string $desc,
    ) {}
}
readonly class Product
{
    public function __construct(
        public ?array $photos = [],
        public ?array $photoAlts = [],
        public string $category,
        public string $name,
        public string $description,
        public ?ProductBadge $badge = null,
    ) {}
}
readonly class Reason
{
    public function __construct(
        public string $svgInner,
        public string $title,
        public string $description,
        public string $highlight,
    ) {}
}
readonly class TrustStat
{
    public function __construct(
        public string $value,
        public string $label,
    ) {}
}
readonly class FooterLinkGroup
{
    public function __construct(
        public string $title,
        /** @var array<string, string> $links  label => href */
        public array  $links,
    ) {}
}
readonly class SocialLink
{
    public function __construct(
        public string $svgInner,
        public string $label,
        public string $href,
    ) {}
}
// HELPER FUNCTIONS
/**
 * Escape a string for safe HTML output.
 */
function esc(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
/**
 * Render a Lucide-compatible stroke SVG icon.
 *
 * @param string $inner       Inner SVG elements (path, circle, etc.) — NOT escaped
 * @param int    $size        Width and height in px
 * @param string $stroke      Stroke colour (CSS colour or "currentColor")
 * @param float  $strokeWidth SVG stroke-width attribute value
 * @param string $extraAttrs  Extra HTML attributes appended to the <svg> tag
 */
function svg_icon(
    string $inner,
    int    $size        = 24,
    string $stroke      = 'currentColor',
    float  $strokeWidth = 2.0,
    string $extraAttrs  = 'aria-hidden="true"',
): string {
    return sprintf(
        '<svg xmlns="http://www.w3.org/2000/svg" width="%d" height="%d" viewBox="0 0 24 24"'
            . ' fill="none" stroke="%s" stroke-width="%.1f"'
            . ' stroke-linecap="round" stroke-linejoin="round" %s>%s</svg>',
        $size,
        $size,
        esc($stroke),
        $strokeWidth,
        $extraAttrs,
        $inner,
    );
}
/**
 * Render the WhatsApp fill SVG (special-case: uses fill, not stroke).
 *
 * @param string $sizeClass Tailwind width/height utility classes
 */
function wa_svg(string $sizeClass = 'w-4 h-4', string $fill = '#25D366'): string
{
    return sprintf(
        '<svg viewBox="0 0 24 24" class="%s fill-[%s]" aria-hidden="true"><path d="%s"/></svg>',
        esc($sizeClass),
        esc($fill),
        WA_SVG_PATH,
    );
}
/**
 * Return a CSS stagger-delay class (d1–d3) for scroll-reveal animations.
 *
 * @param int $index 0-based item index
 * @param int $cols  Number of grid columns
 */
function stagger(int $index, int $cols = 3): string
{
    return 'd' . (($index % $cols) + 1);
}
// DATA
//  Navigation links 
$navLinks = [
    new NavLink('Início',      '#hero'),
    new NavLink('Sobre Nós',   '#about'),
    new NavLink('Produtos',    '#products'),
    new NavLink('Por que Nós', '#why'),
    new NavLink('Contato',     '#contact'),
];
// Navbar dropdown contact items 
$dropdownContacts = [
    new DropdownContact(
        svgHtml: wa_svg(),
        iconBgClass: 'bg-[#25D366]/10',
        label: 'WhatsApp Comercial',
        value: '(11) 99855-7757',
        href: 'https://wa.me/5511998557757',
        external: true,
    ),
    new DropdownContact(
        svgHtml: wa_svg(),
        iconBgClass: 'bg-[#25D366]/10',
        label: 'WhatsApp Comercial',
        value: '(11) 99827-0726',
        href: 'https://wa.me/5511998270726',
        external: true,
    ),
    new DropdownContact(
        svgHtml: svg_icon(
            inner: '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            size: 14,
            stroke: COLOR_GOLD,
        ),
        iconBgClass: 'bg-[#C9973B]/10',
        label: 'E-mail',
        value: 'eduardoartgraf@uol.com.br',
        href: 'mailto:eduardoartgraf@uol.com.br',
        external: false,
    ),
    new DropdownContact(
        svgHtml: svg_icon(
            inner: '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.99 12 19.79 19.79 0 0 1 1.9 3.39 2 2 0 0 1 3.89 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
            size: 14,
            stroke: COLOR_GOLD,
        ),
        iconBgClass: 'bg-[#C9973B]/10',
        label: 'Telefone',
        value: '(11) 3448-2186',
        href: 'tel:+551134482186',
        external: false,
    ),
];
//  Hero slides 
$heroSlides = [
    new HeroSlide(
        image: 'https://images.unsplash.com/photo-1758183961426-88d64eb5f787?w=1920&q=80',
        alt: 'Máquina de impressão offset em operação',
        tag: 'Impressão Offset',
        title: "Precisão que\nFaz a Diferença",
        subtitle: 'Tecnologia de ponta em impressão offset para resultados incomparáveis em qualidade e cor.',
        index: 0,
    ),
    new HeroSlide(
        image: 'https://images.unsplash.com/photo-1581508512961-0e3b9524db40?w=1920&q=80',
        alt: 'Impressora de grande formato para banners',
        tag: 'Grande Formato',
        title: "Do Menor ao\nMaior Projeto",
        subtitle: 'Equipamentos de grande formato para banners, outdoors e sinalização de alto impacto visual.',
        index: 1,
    ),
    new HeroSlide(
        image: 'https://images.unsplash.com/photo-1595142545813-06fee27f3dcb?w=1920&q=80',
        alt: 'Ateliê de impressão artística e tipografia',
        tag: 'Arte & Design',
        title: "Arte que Vive\nno Papel",
        subtitle: 'Combinamos design criativo com a melhor impressão para materializar a sua visão com perfeição.',
        index: 2,
    ),
];
// About highlights 
$highlights = [
    new Highlight(
        svgInner: '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        label: 'ISO 9001',
        desc: 'Certificação de Qualidade',
    ),
    new Highlight(
        svgInner: '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        label: '200+ Parceiros',
        desc: 'Rede de Distribuidores',
    ),
    new Highlight(
        svgInner: '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
        label: '48h Entrega',
        desc: 'Produção Expressa',
    ),
    new Highlight(
        svgInner: '<circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
        label: 'Nacional',
        desc: 'Envio para Todo Brasil',
    ),
];
//  Products 
$products = [
    new Product([
        'web/assets/img/embalagem_personalizada.png',
        'web/assets/img/embalagem_personalizada_2.png',
        'web/assets/img/sacola_personalizada.png'
    ], [], 'Identidade Visual', 'Embalagens & Sacolas', '', null),
    new Product([
        'web/assets/img/adesivo_personalizado.png',
        'web/assets/img/catalogos.png',
        'web/assets/img/blocos_personalizados.png',
        'web/assets/img/receituario_personalizado.png',
        'web/assets/img/envelope_personalizado.png',
    ], [], 'Editorial', 'Adesivos & Catálogos', '', null),
    new Product([
        'web/assets/img/flyers.png',
        'web/assets/img/tags.png',
        'web/assets/img/pasta_personalizada.png',
    ], [], 'Grande Formato', 'Flyers & Tags', '', null),
];
// Why choose reasons 
$reasons = [
    new Reason(
        '<circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>',
        'Personalização',
        'Cada projeto é único, Desde caixas sob medida até folhetos e outros materiais promocionais, trabalhamos em estreita colaboração com você para criar soluções que realmente refletem a identidade da sua marca.',
        'Fidelidade 100%',
    ),
    new Reason(
        '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'Atendimento Ágil e Eficiente',
        'Nosso compromisso é entregar resultados rápidos sem comprometer a qualidade. garantimos prazos de entrega e um atendimento ao cliente excepcional para que você tenha uma experiência tranquila e satisfatória.',
        'On-time Delivery',
    ),
    new Reason(
        '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        'Alta Qualidade',
        'Utilizamos tecnologia de ponta e materiais de alta qualidade para garantir que cada produto que entregamos atenda aos mais altos padrões.',
        'Premium Quality',
    ),
];
//  Trust metrics bar
$trustStats = [
    new TrustStat('0/0', 'Nota no Google'),
    new TrustStat('0%', 'Taxa de Satisfação'),
    new TrustStat('< 0%', 'Taxa de Retrabalho'),
    new TrustStat('24h', 'Resposta Média'),
];
// Footer link groups 
$footerGroups = [
    new FooterLinkGroup('Serviços Personalizados', [
        'Embalagens' => '#products',
        'Pastas' => '#products',
        'Catálogos' => '#products',
        'Tags' => '#products',
        'Sacolas' => '#products',
        'Receituários' => '#products',
        'Rótulos' => '#products',
        'Bulas' => '#products',
    ]),
    new FooterLinkGroup('­ ', [
        'Flyers' => '#products',
        'Folders' => '#products',
        'Folhetos' => '#products',
        'Adesivos' => '#products',
        'Envelopes' => '#products',
        'Blocos' => '#products',
        'Banners' => '#products',
    ]),
    new FooterLinkGroup('Empresa', [
        'Sobre Nós' => '#about',
        'Contato' => '#contact',
    ])
];
// Social links 
$socialLinks = [
    new SocialLink(
        '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
        'Instagram da Art Impressa',
        'https://instagram.com/',
    ),
    new SocialLink(
        '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'Facebook da Art Impressa',
        'https://facebook.com/',
    ),
    new SocialLink(
        '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
        'LinkedIn da Art Impressa',
        'https://linkedin.com/company/',
    ),
];
