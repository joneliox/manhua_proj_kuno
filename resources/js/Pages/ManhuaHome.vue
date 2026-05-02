<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";
import { Head, Link, usePage } from "@inertiajs/vue3";

// ─── Props from Inertia controller ────────────────────────────────────────────
const props = defineProps({
    featuredManhua: { type: Array, default: () => [] },
    trendingToday: { type: Array, default: () => [] },
    popularManhua: { type: Array, default: () => [] },
    latestUpdates: { type: Array, default: () => [] },
    genres: { type: Array, default: () => [] },
});

// ─── MOCK DATA (replace with props once controller supplies real data) ─────────
const featured = ref(
    props.featuredManhua.length
        ? props.featuredManhua
        : [
              {
                  id: 1,
                  title: "Soul Land IV",
                  cover: null,
                  genre: "Action · Fantasy",
                  rating: "9.8",
                  chapters: 412,
                  description:
                      "Tang San returns in a new age where the Spirit Hall has crumbled and soul beasts walk among men once more.",
              },
              {
                  id: 2,
                  title: "Dragon Prince Yuan",
                  cover: null,
                  genre: "Cultivation · Adventure",
                  rating: "9.5",
                  chapters: 389,
                  description:
                      "A crown prince whose sacred dragon spirit was stolen must rise through impossible trials to reclaim his destiny.",
              },
              {
                  id: 3,
                  title: "Martial Peak",
                  cover: null,
                  genre: "Martial Arts · Romance",
                  rating: "9.2",
                  chapters: 891,
                  description:
                      "The journey to the martial peak is a lonely, solitary and long one. In the face of adversity, you must survive and remain unyielding.",
              },
              {
                  id: 4,
                  title: "Battle Through the Heavens",
                  cover: null,
                  genre: "Fantasy · Action",
                  rating: "9.6",
                  chapters: 505,
                  description:
                      "In a land where no magic is present, a land where only those with innate talent can challenge the heavens.",
              },
              {
                  id: 5,
                  title: "The King's Avatar",
                  cover: null,
                  genre: "Gaming · Sport",
                  rating: "9.4",
                  chapters: 322,
                  description:
                      "Regarded as a pro-player legend, Ye Xiu is forced to retire but mounts the greatest comeback in esports history.",
              },
          ],
);

const trending = ref(
    props.trendingToday.length
        ? props.trendingToday
        : [
              {
                  id: 1,
                  title: "Soul Land IV",
                  cover: null,
                  genre: "Action",
                  rating: "9.8",
                  rank: 1,
                  views: "2.1M",
                  chapters: 412,
              },
              {
                  id: 2,
                  title: "Apotheosis",
                  cover: null,
                  genre: "Fantasy",
                  rating: "9.1",
                  rank: 2,
                  views: "1.8M",
                  chapters: 1102,
              },
              {
                  id: 3,
                  title: "Dragon Prince Yuan",
                  cover: null,
                  genre: "Cultivation",
                  rating: "9.5",
                  rank: 3,
                  views: "1.6M",
                  chapters: 389,
              },
              {
                  id: 4,
                  title: "Peerless Battle Spirit",
                  cover: null,
                  genre: "Martial Arts",
                  rating: "8.9",
                  rank: 4,
                  views: "1.2M",
                  chapters: 2014,
              },
              {
                  id: 5,
                  title: "Against The Gods",
                  cover: null,
                  genre: "Romance",
                  rating: "9.3",
                  rank: 5,
                  views: "1.1M",
                  chapters: 1749,
              },
              {
                  id: 6,
                  title: "Tales of Demons and Gods",
                  cover: null,
                  genre: "Adventure",
                  rating: "9.0",
                  rank: 6,
                  views: "998K",
                  chapters: 444,
              },
          ],
);

const popular = ref(
    props.popularManhua.length
        ? props.popularManhua
        : [
              {
                  id: 1,
                  title: "Martial Peak",
                  cover: null,
                  genre: "Martial Arts",
                  rating: "9.2",
                  chapters: 891,
                  status: "Ongoing",
                  badge: "HOT",
              },
              {
                  id: 2,
                  title: "Battle Through the Heavens",
                  cover: null,
                  genre: "Fantasy",
                  rating: "9.6",
                  chapters: 505,
                  status: "Completed",
                  badge: null,
              },
              {
                  id: 3,
                  title: "The King's Avatar",
                  cover: null,
                  genre: "Gaming",
                  rating: "9.4",
                  chapters: 322,
                  status: "Completed",
                  badge: "TOP",
              },
              {
                  id: 4,
                  title: "Soul Land III",
                  cover: null,
                  genre: "Action",
                  rating: "9.7",
                  chapters: 598,
                  status: "Ongoing",
                  badge: "TOP",
              },
              {
                  id: 5,
                  title: "Fog Hill of Five Elements",
                  cover: null,
                  genre: "Action",
                  rating: "9.9",
                  chapters: 88,
                  status: "Ongoing",
                  badge: "NEW",
              },
              {
                  id: 6,
                  title: "A Record of a Mortal's Journey",
                  cover: null,
                  genre: "Cultivation",
                  rating: "9.1",
                  chapters: 367,
                  status: "Ongoing",
                  badge: null,
              },
              {
                  id: 7,
                  title: "Wu Dong Qian Kun",
                  cover: null,
                  genre: "Action",
                  rating: "9.0",
                  chapters: 498,
                  status: "Completed",
                  badge: null,
              },
              {
                  id: 8,
                  title: "Coiling Dragon",
                  cover: null,
                  genre: "Fantasy",
                  rating: "9.3",
                  chapters: 440,
                  status: "Completed",
                  badge: null,
              },
              {
                  id: 9,
                  title: "Nine Star Hegemon Body",
                  cover: null,
                  genre: "Martial Arts",
                  rating: "8.8",
                  chapters: 2001,
                  status: "Ongoing",
                  badge: null,
              },
              {
                  id: 10,
                  title: "Magic Emperor",
                  cover: null,
                  genre: "Fantasy",
                  rating: "8.7",
                  chapters: 412,
                  status: "Ongoing",
                  badge: "NEW",
              },
          ],
);

const latest = ref(
    props.latestUpdates.length
        ? props.latestUpdates
        : [
              {
                  id: 1,
                  title: "Soul Land IV",
                  cover: null,
                  genre: "Action",
                  latestChapter: 412,
                  updatedAt: "2 min ago",
                  isNew: true,
              },
              {
                  id: 2,
                  title: "Martial Peak",
                  cover: null,
                  genre: "Martial Arts",
                  latestChapter: 891,
                  updatedAt: "15 min ago",
                  isNew: true,
              },
              {
                  id: 3,
                  title: "Dragon Prince Yuan",
                  cover: null,
                  genre: "Cultivation",
                  latestChapter: 389,
                  updatedAt: "1 hr ago",
                  isNew: false,
              },
              {
                  id: 4,
                  title: "Apotheosis",
                  cover: null,
                  genre: "Fantasy",
                  latestChapter: 1102,
                  updatedAt: "2 hr ago",
                  isNew: false,
              },
              {
                  id: 5,
                  title: "Against The Gods",
                  cover: null,
                  genre: "Romance",
                  latestChapter: 1749,
                  updatedAt: "3 hr ago",
                  isNew: false,
              },
              {
                  id: 6,
                  title: "Battle Through the Heavens",
                  cover: null,
                  genre: "Fantasy",
                  latestChapter: 505,
                  updatedAt: "5 hr ago",
                  isNew: false,
              },
              {
                  id: 7,
                  title: "The King's Avatar",
                  cover: null,
                  genre: "Gaming",
                  latestChapter: 322,
                  updatedAt: "6 hr ago",
                  isNew: false,
              },
              {
                  id: 8,
                  title: "Fog Hill of Five Elements",
                  cover: null,
                  genre: "Action",
                  latestChapter: 88,
                  updatedAt: "8 hr ago",
                  isNew: false,
              },
              {
                  id: 9,
                  title: "Nine Star Hegemon Body",
                  cover: null,
                  genre: "Martial Arts",
                  latestChapter: 2001,
                  updatedAt: "10 hr ago",
                  isNew: false,
              },
              {
                  id: 10,
                  title: "Peerless Battle Spirit",
                  cover: null,
                  genre: "Martial Arts",
                  latestChapter: 2014,
                  updatedAt: "12 hr ago",
                  isNew: false,
              },
              {
                  id: 11,
                  title: "Tales of Demons and Gods",
                  cover: null,
                  genre: "Adventure",
                  latestChapter: 444,
                  updatedAt: "14 hr ago",
                  isNew: false,
              },
              {
                  id: 12,
                  title: "Coiling Dragon",
                  cover: null,
                  genre: "Fantasy",
                  latestChapter: 440,
                  updatedAt: "1 day ago",
                  isNew: false,
              },
          ],
);

const page = usePage();
const authUser = computed(() => page.props.auth?.user ?? null);
const canLogin = computed(() => page.props.canLogin !== false);
const canRegister = computed(() => page.props.canRegister !== false);

// ─── NAVBAR STATE ──────────────────────────────────────────────────────────────
const mobileMenuOpen = ref(false);
const accountMenuOpen = ref(false);
const accountMenuRef = ref(null);
const searchOpen = ref(false);
const searchQuery = ref("");
const scrolled = ref(false);
const searchResults = ref([]);

const navLinks = [
    { label: "Home", href: "#" },
    { label: "Browse", href: "#browse" },
    { label: "Genres", href: "#genres" },
    { label: "Latest", href: "#latest" },
    { label: "Rankings", href: "#trending" },
    { label: "Login", href: "#trending" },
];

const handleScroll = () => {
    scrolled.value = window.scrollY > 20;
};

const closeAccountOnDocClick = (e) => {
    if (!accountMenuOpen.value || !accountMenuRef.value) return;
    if (!accountMenuRef.value.contains(e.target)) accountMenuOpen.value = false;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    document.addEventListener("click", closeAccountOnDocClick);
});
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
    document.removeEventListener("click", closeAccountOnDocClick);
});

const handleSearch = () => {
    if (!searchQuery.value.trim()) {
        searchResults.value = [];
        return;
    }
    // Simulate search — replace with real API call
    searchResults.value = [...featured.value, ...trending.value]
        .filter((m) =>
            m.title.toLowerCase().includes(searchQuery.value.toLowerCase()),
        )
        .slice(0, 5);
};

const closeSearch = () => {
    searchOpen.value = false;
    searchQuery.value = "";
    searchResults.value = [];
};

// ─── HERO CAROUSEL STATE ───────────────────────────────────────────────────────
const currentSlide = ref(0);
const isAnimating = ref(false);
let autoplayTimer = null;

const nextSlide = () => {
    if (isAnimating.value) return;
    isAnimating.value = true;
    currentSlide.value = (currentSlide.value + 1) % featured.value.length;
    setTimeout(() => {
        isAnimating.value = false;
    }, 600);
};

const prevSlide = () => {
    if (isAnimating.value) return;
    isAnimating.value = true;
    currentSlide.value =
        (currentSlide.value - 1 + featured.value.length) %
        featured.value.length;
    setTimeout(() => {
        isAnimating.value = false;
    }, 600);
};

const goToSlide = (index) => {
    if (index !== currentSlide.value) {
        currentSlide.value = index;
    }
};

const startAutoplay = () => {
    autoplayTimer = setInterval(nextSlide, 5000);
};
const stopAutoplay = () => clearInterval(autoplayTimer);

onMounted(() => startAutoplay());
onUnmounted(() => stopAutoplay());

// ─── POPULAR FILTER ────────────────────────────────────────────────────────────
const popularFilter = ref("weekly");
const popularFilters = ["weekly", "monthly", "all time"];

// Generate consistent placeholder colors from title
const titleColor = (title) => {
    const colors = [
        ["#1a0a0a", "#8b1a1a"],
        ["#0a0a1a", "#1a1a8b"],
        ["#0a1a0a", "#1a8b1a"],
        ["#1a0a1a", "#8b1a8b"],
        ["#1a1a0a", "#8b8b1a"],
        ["#0a1a1a", "#1a8b8b"],
    ];
    let hash = 0;
    for (let i = 0; i < title.length; i++)
        hash = title.charCodeAt(i) + ((hash << 5) - hash);
    return colors[Math.abs(hash) % colors.length];
};

const coverGradient = (title) => {
    const [from, to] = titleColor(title);
    return `linear-gradient(135deg, ${from} 0%, ${to} 100%)`;
};

const heroGradient = (title) => {
    const [from] = titleColor(title);
    return `radial-gradient(ellipse at 60% 40%, ${from}99 0%, #000 70%)`;
};
</script>

<template>
    <Head title="MangaVerse — Read Manhua Online" />

    <div class="manhua-app">
        <!-- ══════════════════════════════════════════════════════════════
             NAVIGATION BAR
        ══════════════════════════════════════════════════════════════ -->
        <nav :class="['navbar', { 'navbar--scrolled': scrolled }]">
            <div class="navbar__inner">
                <!-- Logo -->
                <a href="#" class="navbar__logo">
                    <span class="logo-icon">龙</span>
                    <span class="logo-text">MangaVerse</span>
                </a>

                <!-- Desktop Nav Links -->
                <ul class="navbar__links">
                    <li v-for="link in navLinks" :key="link.label">
                        <a :href="link.href" class="nav-link">{{
                            link.label
                        }}</a>
                    </li>
                </ul>

                <!-- Right Controls -->
                <div class="navbar__actions">
                        <!-- Search -->
                        <div
                            class="search-wrapper"
                            :class="{ 'search-wrapper--open': searchOpen }"
                        >
                            <input
                                v-if="searchOpen"
                                v-model="searchQuery"
                                @input="handleSearch"
                                @keydown.escape="closeSearch"
                                placeholder="Search manhua, genres..."
                                class="search-input"
                                autofocus
                            />
                            <button
                                @click="
                                    searchOpen = !searchOpen;
                                    if (!searchOpen) closeSearch();
                                "
                                class="icon-btn"
                                aria-label="Search"
                            >
                                <svg
                                    v-if="!searchOpen"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <circle cx="11" cy="11" r="8" />
                                    <line
                                        x1="21"
                                        y1="21"
                                        x2="16.65"
                                        y2="16.65"
                                    />
                                </svg>
                                <svg
                                    v-else
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </button>

                            <!-- Search Dropdown -->
                            <div
                                v-if="searchOpen && searchResults.length"
                                class="search-results"
                            >
                                <a
                                    v-for="r in searchResults"
                                    :key="r.id"
                                    href="#"
                                    class="search-result-item"
                                >
                                    <div
                                        class="search-result-cover"
                                        :style="{
                                            background: coverGradient(r.title),
                                        }"
                                    >
                                        <span>{{ r.title[0] }}</span>
                                    </div>
                                    <div>
                                        <p class="search-result-title">
                                            {{ r.title }}
                                        </p>
                                        <p class="search-result-genre">
                                            {{ r.genre }}
                                        </p>
                                    </div>
                                    <span class="search-result-rating"
                                        >★ {{ r.rating }}</span
                                    >
                                </a>
                            </div>
                            <div
                                v-if="
                                    searchOpen &&
                                    searchQuery &&
                                    !searchResults.length
                                "
                                class="search-results search-results--empty"
                            >
                                <p>No results for "{{ searchQuery }}"</p>
                            </div>
                        </div>

                        <!-- Account: login / register or user menu -->
                        <div
                            v-if="canLogin"
                            ref="accountMenuRef"
                            class="account-menu"
                        >
                            <button
                                type="button"
                                class="icon-btn account-menu__trigger"
                                :class="{
                                    'account-menu__trigger--active':
                                        accountMenuOpen,
                                }"
                                aria-label="Account menu"
                                :aria-expanded="accountMenuOpen"
                                aria-haspopup="true"
                                @click="accountMenuOpen = !accountMenuOpen"
                            >
                                <svg
                                    class="account-menu__trigger-icon"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"
                                    />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </button>
                            <Transition name="account-dropdown">
                                <div
                                    v-if="accountMenuOpen"
                                    class="account-menu__dropdown"
                                >
                                    <template v-if="authUser">
                                        <p class="account-menu__label">
                                            {{ authUser.name }}
                                        </p>
                                        <Link
                                            :href="route('dashboard')"
                                            class="account-menu__link"
                                            @click="accountMenuOpen = false"
                                            >Dashboard</Link
                                        >
                                        <Link
                                            :href="route('profile.edit')"
                                            class="account-menu__link"
                                            @click="accountMenuOpen = false"
                                            >Profile</Link
                                        >
                                        <Link
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                            class="account-menu__link account-menu__link--button"
                                            @click="accountMenuOpen = false"
                                        >
                                            Log out
                                        </Link>
                                    </template>
                                    <template v-else>
                                        <Link
                                            :href="route('login')"
                                            class="account-menu__link"
                                            @click="accountMenuOpen = false"
                                            >Log in</Link
                                        >
                                        <Link
                                            v-if="canRegister"
                                            :href="route('register')"
                                            class="account-menu__link"
                                            @click="accountMenuOpen = false"
                                        >
                                            Register
                                        </Link>
                                    </template>
                                </div>
                            </Transition>
                        </div>

                        <a href="#" class="btn-nav-cta">Start Reading</a>

                        <!-- Mobile hamburger -->
                        <button
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="icon-btn hamburger"
                            aria-label="Menu"
                        >
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <line
                                    v-if="!mobileMenuOpen"
                                    x1="3"
                                    y1="6"
                                    x2="21"
                                    y2="6"
                                />
                                <line
                                    v-if="!mobileMenuOpen"
                                    x1="3"
                                    y1="12"
                                    x2="21"
                                    y2="12"
                                />
                                <line
                                    v-if="!mobileMenuOpen"
                                    x1="3"
                                    y1="18"
                                    x2="21"
                                    y2="18"
                                />
                                <line
                                    v-if="mobileMenuOpen"
                                    x1="18"
                                    y1="6"
                                    x2="6"
                                    y2="18"
                                />
                                <line
                                    v-if="mobileMenuOpen"
                                    x1="6"
                                    y1="6"
                                    x2="18"
                                    y2="18"
                                />
                            </svg>
                        </button>
                </div>

                <!-- Mobile Menu Drawer -->
                <div v-if="mobileMenuOpen" class="mobile-menu">
                    <div class="mobile-search">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            class="mobile-search-icon"
                        >
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input
                            v-model="searchQuery"
                            @input="handleSearch"
                            placeholder="Search manhua..."
                            class="mobile-search-input"
                        />
                    </div>
                    <ul class="mobile-nav-links">
                        <li v-for="link in navLinks" :key="link.label">
                            <a
                                :href="link.href"
                                @click="mobileMenuOpen = false"
                                class="mobile-nav-link"
                                >{{ link.label }}</a
                            >
                        </li>
                    </ul>
                    <div v-if="canLogin" class="mobile-auth">
                        <p class="mobile-auth-title">Account</p>
                        <template v-if="authUser">
                            <p class="mobile-auth-user">{{ authUser.name }}</p>
                            <Link
                                :href="route('dashboard')"
                                class="mobile-auth-link"
                                @click="mobileMenuOpen = false"
                                >Dashboard</Link
                            >
                            <Link
                                :href="route('profile.edit')"
                                class="mobile-auth-link"
                                @click="mobileMenuOpen = false"
                                >Profile</Link
                            >
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="mobile-auth-link mobile-auth-link--button"
                                @click="mobileMenuOpen = false"
                            >
                                Log out
                            </Link>
                        </template>
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="mobile-auth-link"
                                @click="mobileMenuOpen = false"
                                >Log in</Link
                            >
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="mobile-auth-link"
                                @click="mobileMenuOpen = false"
                            >
                                Register
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <!-- ══════════════════════════════════════════════════════════════
             HERO CAROUSEL
        ══════════════════════════════════════════════════════════════ -->
        <section
            class="hero-carousel"
            @mouseenter="stopAutoplay"
            @mouseleave="startAutoplay"
        >
            <!-- Slides -->
            <div class="hero-slides">
                <div
                    v-for="(slide, index) in featured"
                    :key="slide.id"
                    class="hero-slide"
                    :class="{ 'hero-slide--active': index === currentSlide }"
                >
                    <!-- Background -->
                    <div
                        class="hero-bg"
                        :style="{ background: heroGradient(slide.title) }"
                    >
                        <div class="hero-noise"></div>
                        <div class="hero-lines"></div>
                    </div>

                    <!-- Content -->
                    <div
                        class="hero-content"
                        :class="{
                            'hero-content--visible': index === currentSlide,
                        }"
                    >
                        <div class="hero-meta">
                            <span class="hero-genre-tag">{{
                                slide.genre
                            }}</span>
                            <span class="hero-divider">·</span>
                            <span class="hero-chapters"
                                >{{ slide.chapters }} Chapters</span
                            >
                        </div>
                        <h1 class="hero-title">{{ slide.title }}</h1>
                        <p class="hero-desc">{{ slide.description }}</p>
                        <div class="hero-rating">
                            <span class="star-icon">★</span>
                            <span class="rating-value">{{ slide.rating }}</span>
                            <span class="rating-label">/ 10</span>
                        </div>
                        <div class="hero-actions">
                            <a href="#" class="btn-read">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                                Read Now
                            </a>
                            <a href="#" class="btn-add">
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add to List
                            </a>
                        </div>
                    </div>

                    <!-- Cover Artwork -->
                    <div
                        class="hero-artwork"
                        :class="{
                            'hero-artwork--visible': index === currentSlide,
                        }"
                    >
                        <div class="artwork-frame">
                            <div
                                class="artwork-cover"
                                :style="{
                                    background: coverGradient(slide.title),
                                }"
                            >
                                <span class="artwork-initial">{{
                                    slide.title[0]
                                }}</span>
                                <div class="artwork-shine"></div>
                            </div>
                        </div>
                        <div
                            class="artwork-glow"
                            :style="{ background: coverGradient(slide.title) }"
                        ></div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button
                @click="prevSlide"
                class="carousel-btn carousel-btn--prev"
                aria-label="Previous"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.5"
                >
                    <polyline points="15,18 9,12 15,6" />
                </svg>
            </button>
            <button
                @click="nextSlide"
                class="carousel-btn carousel-btn--next"
                aria-label="Next"
            >
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.5"
                >
                    <polyline points="9,18 15,12 9,6" />
                </svg>
            </button>

            <!-- Dots -->
            <div class="carousel-dots">
                <button
                    v-for="(_, i) in featured"
                    :key="i"
                    @click="goToSlide(i)"
                    class="carousel-dot"
                    :class="{ 'carousel-dot--active': i === currentSlide }"
                    :aria-label="`Go to slide ${i + 1}`"
                ></button>
            </div>

            <!-- Progress Bar -->
            <div class="hero-progress">
                <div class="hero-progress-bar" :key="currentSlide"></div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             TRENDING TODAY
        ══════════════════════════════════════════════════════════════ -->
        <section class="section trending-section" id="trending">
            <div class="section-inner">
                <div class="section-header">
                    <div class="section-title-group">
                        <span class="section-eyebrow">🔥 Live Rankings</span>
                        <h2 class="section-title">Trending Today</h2>
                    </div>
                    <a href="#" class="see-all-link">View All Rankings →</a>
                </div>

                <div class="trending-grid">
                    <a
                        v-for="item in trending"
                        :key="item.id"
                        href="#"
                        class="trending-card"
                        :class="{ 'trending-card--top3': item.rank <= 3 }"
                    >
                        <div
                            class="trending-rank"
                            :class="[`rank-${item.rank}`]"
                        >
                            <span>{{ item.rank }}</span>
                        </div>
                        <div
                            class="trending-cover"
                            :style="{ background: coverGradient(item.title) }"
                        >
                            <span>{{ item.title[0] }}</span>
                        </div>
                        <div class="trending-info">
                            <h3 class="trending-title">{{ item.title }}</h3>
                            <span class="trending-genre">{{ item.genre }}</span>
                            <div class="trending-stats">
                                <span class="trending-views"
                                    >👁 {{ item.views }}</span
                                >
                                <span class="trending-rating"
                                    >★ {{ item.rating }}</span
                                >
                            </div>
                        </div>
                        <div class="trending-chapters">
                            <span>Ch. {{ item.chapters }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             POPULAR MANHUA
        ══════════════════════════════════════════════════════════════ -->
        <section class="section popular-section" id="browse">
            <div class="section-inner">
                <div class="section-header">
                    <div class="section-title-group">
                        <span class="section-eyebrow">⭐ Editor's Pick</span>
                        <h2 class="section-title">Most Popular</h2>
                    </div>
                    <div class="popular-filters">
                        <button
                            v-for="filter in popularFilters"
                            :key="filter"
                            @click="popularFilter = filter"
                            class="filter-btn"
                            :class="{
                                'filter-btn--active': popularFilter === filter,
                            }"
                        >
                            {{
                                filter.charAt(0).toUpperCase() + filter.slice(1)
                            }}
                        </button>
                    </div>
                </div>

                <div class="popular-grid">
                    <a
                        v-for="(item, index) in popular"
                        :key="item.id"
                        href="#"
                        class="popular-card"
                    >
                        <div class="popular-cover-wrapper">
                            <div
                                class="popular-cover"
                                :style="{
                                    background: coverGradient(item.title),
                                }"
                            >
                                <span class="popular-cover-initial">{{
                                    item.title[0]
                                }}</span>
                                <div class="popular-cover-overlay">
                                    <span class="read-now-text">Read Now</span>
                                </div>
                            </div>
                            <div
                                v-if="item.badge"
                                class="popular-badge"
                                :class="`badge--${item.badge.toLowerCase()}`"
                            >
                                {{ item.badge }}
                            </div>
                            <div class="popular-rank-badge">
                                {{ index + 1 }}
                            </div>
                        </div>
                        <div class="popular-info">
                            <h3 class="popular-title">{{ item.title }}</h3>
                            <span class="popular-genre">{{ item.genre }}</span>
                            <div class="popular-meta">
                                <span class="popular-rating"
                                    >★ {{ item.rating }}</span
                                >
                                <span
                                    class="popular-status"
                                    :class="
                                        item.status === 'Ongoing'
                                            ? 'status--ongoing'
                                            : 'status--completed'
                                    "
                                >
                                    {{ item.status }}
                                </span>
                            </div>
                            <span class="popular-chapters"
                                >{{ item.chapters }} Ch</span
                            >
                        </div>
                    </a>
                </div>

                <div class="load-more-wrapper">
                    <button class="btn-load-more">Load More Titles</button>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             LATEST UPDATES
        ══════════════════════════════════════════════════════════════ -->
        <section class="section latest-section" id="latest">
            <div class="section-inner">
                <div class="section-header">
                    <div class="section-title-group">
                        <span class="section-eyebrow">🕐 Fresh Releases</span>
                        <h2 class="section-title">Latest Updates</h2>
                    </div>
                    <a href="#" class="see-all-link">View All Updates →</a>
                </div>

                <div class="latest-list">
                    <a
                        v-for="item in latest"
                        :key="item.id"
                        href="#"
                        class="latest-item"
                    >
                        <div
                            class="latest-cover"
                            :style="{ background: coverGradient(item.title) }"
                        >
                            <span>{{ item.title[0] }}</span>
                        </div>
                        <div class="latest-info">
                            <div class="latest-top">
                                <h3 class="latest-title">{{ item.title }}</h3>
                                <div v-if="item.isNew" class="new-badge">
                                    NEW
                                </div>
                            </div>
                            <span class="latest-genre">{{ item.genre }}</span>
                        </div>
                        <div class="latest-chapter-info">
                            <span class="latest-chapter-num"
                                >Chapter {{ item.latestChapter }}</span
                            >
                            <span class="latest-time">{{
                                item.updatedAt
                            }}</span>
                        </div>
                        <div class="latest-arrow">
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <polyline points="9,18 15,12 9,6" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             GENRE SECTION
        ══════════════════════════════════════════════════════════════ -->
        <section class="section genre-section" id="genres">
            <div class="section-inner">
                <div class="section-header">
                    <div class="section-title-group">
                        <span class="section-eyebrow">📚 Browse By Type</span>
                        <h2 class="section-title">Explore Genres</h2>
                    </div>
                </div>
                <div class="genre-grid">
                    <a
                        v-for="g in [
                            { name: 'Action', icon: '⚔️', count: '1,204' },
                            { name: 'Fantasy', icon: '🧙', count: '892' },
                            { name: 'Cultivation', icon: '☯️', count: '674' },
                            { name: 'Romance', icon: '💫', count: '551' },
                            { name: 'Gaming', icon: '🎮', count: '423' },
                            { name: 'Adventure', icon: '🗺️', count: '389' },
                            { name: 'Martial Arts', icon: '🥊', count: '764' },
                            { name: 'Mystery', icon: '🔮', count: '298' },
                        ]"
                        :key="g.name"
                        href="#"
                        class="genre-card"
                    >
                        <span class="genre-icon">{{ g.icon }}</span>
                        <span class="genre-name">{{ g.name }}</span>
                        <span class="genre-count">{{ g.count }} titles</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             FOOTER
        ══════════════════════════════════════════════════════════════ -->
        <footer class="footer">
            <div class="footer-inner">
                <!-- Top Row -->
                <div class="footer-top">
                    <!-- Brand Column -->
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <span class="logo-icon">龙</span>
                            <span class="logo-text">MangaVerse</span>
                        </div>
                        <p class="footer-tagline">
                            The premier destination for manhua readers
                            worldwide. Thousands of titles. Free to read. Always
                            updated.
                        </p>
                        <div class="footer-socials">
                            <a href="#" class="social-btn" aria-label="Discord">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057c.003.02.015.04.031.053a19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="social-btn"
                                aria-label="Twitter/X"
                            >
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                    />
                                </svg>
                            </a>
                            <a href="#" class="social-btn" aria-label="Reddit">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Nav Columns -->
                    <div class="footer-nav-columns">
                        <div class="footer-col">
                            <h4 class="footer-col-title">Discover</h4>
                            <ul>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Browse All</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >New Releases</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Top Rated</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Completed</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link">Ongoing</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4 class="footer-col-title">Genres</h4>
                            <ul>
                                <li>
                                    <a href="#" class="footer-link">Action</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link">Fantasy</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link">Romance</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Cultivation</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Martial Arts</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4 class="footer-col-title">Company</h4>
                            <ul>
                                <li>
                                    <a href="#" class="footer-link">About Us</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link">Contact</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Advertise</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link">Careers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4 class="footer-col-title">Legal</h4>
                            <ul>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Terms of Use</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Privacy Policy</a
                                    >
                                </li>
                                <li>
                                    <a href="#" class="footer-link">DMCA</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link"
                                        >Cookie Policy</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="footer-bottom">
                    <p class="footer-copyright">
                        © {{ new Date().getFullYear() }} MangaVerse. All rights
                        reserved. Manga/Manhua content belongs to their
                        respective creators.
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link">Privacy</a>
                        <a href="#" class="footer-bottom-link">Terms</a>
                        <a href="#" class="footer-bottom-link">DMCA</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* ════════════════════════════════════════════════════════════════════════════
   CSS CUSTOM PROPERTIES
════════════════════════════════════════════════════════════════════════════ */
.manhua-app {
    --red: #c8152a;
    --red-dark: #8b0d1c;
    --red-glow: rgba(200, 21, 42, 0.25);
    --gold: #d4a017;
    --gold-light: #f0c040;
    --black: #080808;
    --dark: #0e0e0e;
    --dark-2: #141414;
    --dark-3: #1c1c1c;
    --dark-4: #242424;
    --border: rgba(255, 255, 255, 0.06);
    --border-bright: rgba(255, 255, 255, 0.12);
    --text-primary: #f0f0f0;
    --text-secondary: #8a8a8a;
    --text-muted: #555;
    --radius-sm: 6px;
    --radius: 10px;
    --radius-lg: 16px;
    --shadow: 0 8px 32px rgba(0, 0, 0, 0.6);
    --transition: 0.25s cubic-bezier(0.4, 0, 0.2, 1);

    background: var(--black);
    color: var(--text-primary);
    font-family: "Georgia", "Times New Roman", serif;
    min-height: 100vh;
    overflow-x: hidden;
}

/* ════════════════════════════════════════════════════════════════════════════
   NAVBAR
════════════════════════════════════════════════════════════════════════════ */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    transition:
        background var(--transition),
        backdrop-filter var(--transition),
        box-shadow var(--transition);
    border-bottom: 1px solid transparent;
}

.navbar--scrolled {
    background: rgba(8, 8, 8, 0.92);
    backdrop-filter: blur(20px);
    border-bottom-color: var(--border);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
}

.navbar__inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
    height: 68px;
    display: flex;
    align-items: center;
    gap: 40px;
}

/* Logo */
.navbar__logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    flex-shrink: 0;
}

.logo-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: var(--red);
    color: white;
    font-size: 16px;
    font-weight: 900;
    border-radius: var(--radius-sm);
    box-shadow: 0 0 14px var(--red-glow);
    font-family: serif;
}

.logo-text {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-primary);
    letter-spacing: -0.02em;
    font-family: "Georgia", serif;
}

/* Nav Links */
.navbar__links {
    display: flex;
    gap: 4px;
    list-style: none;
    margin: 0;
    padding: 0;
    flex: 1;
}

.nav-link {
    padding: 6px 14px;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 14px;
    font-family: "Arial", sans-serif;
    font-weight: 500;
    border-radius: var(--radius-sm);
    transition:
        color var(--transition),
        background var(--transition);
    letter-spacing: 0.02em;
}

.nav-link:hover {
    color: var(--text-primary);
    background: var(--dark-3);
}

/* Actions */
.navbar__actions {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-left: auto;
}

/* Search */
.search-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
}

.search-input {
    width: 240px;
    height: 36px;
    background: var(--dark-3);
    border: 1px solid var(--border-bright);
    border-radius: var(--radius-sm);
    color: var(--text-primary);
    padding: 0 12px;
    font-size: 14px;
    font-family: "Arial", sans-serif;
    outline: none;
    transition: border-color var(--transition);
}

.search-input:focus {
    border-color: var(--red);
}

.search-input::placeholder {
    color: var(--text-muted);
}

.search-results {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    width: 320px;
    background: var(--dark-3);
    border: 1px solid var(--border-bright);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    z-index: 200;
}

.search-results--empty {
    padding: 16px;
    text-align: center;
    color: var(--text-secondary);
    font-size: 14px;
    font-family: "Arial", sans-serif;
}

.search-result-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    text-decoration: none;
    transition: background var(--transition);
    border-bottom: 1px solid var(--border);
}

.search-result-item:last-child {
    border-bottom: none;
}
.search-result-item:hover {
    background: var(--dark-4);
}

.search-result-cover {
    width: 36px;
    height: 48px;
    border-radius: 4px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.6);
    font-size: 14px;
    font-weight: 700;
}

.search-result-title {
    color: var(--text-primary);
    font-size: 13px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    margin: 0 0 2px;
}

.search-result-genre {
    color: var(--text-secondary);
    font-size: 11px;
    font-family: "Arial", sans-serif;
    margin: 0;
}

.search-result-rating {
    margin-left: auto;
    color: var(--gold-light);
    font-size: 12px;
    font-family: "Arial", sans-serif;
    white-space: nowrap;
}

.icon-btn {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--border-bright);
    background: transparent;
    color: var(--text-secondary);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition:
        color var(--transition),
        border-color var(--transition),
        background var(--transition);
}

.icon-btn svg {
    width: 18px;
    height: 18px;
}
.icon-btn:hover {
    color: var(--text-primary);
    border-color: var(--red);
    background: rgba(200, 21, 42, 0.08);
}

.btn-nav-cta {
    padding: 8px 18px;
    background: var(--red);
    color: white;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    border-radius: var(--radius-sm);
    letter-spacing: 0.03em;
    transition:
        background var(--transition),
        box-shadow var(--transition);
    white-space: nowrap;
}

.btn-nav-cta:hover {
    background: var(--red-dark);
    box-shadow: 0 0 16px var(--red-glow);
}

.hamburger {
    display: none;
}

/* Account menu (navbar) */
.account-menu {
    position: relative;
    flex-shrink: 0;
}

.account-menu__trigger-icon {
    width: 18px;
    height: 18px;
}

.account-menu__trigger--active {
    color: var(--text-primary);
    border-color: var(--red);
    background: rgba(200, 21, 42, 0.12);
}

.account-menu__dropdown {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    min-width: 200px;
    padding: 8px;
    background: var(--dark-2);
    border: 1px solid var(--border-bright);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    z-index: 220;
}

.account-menu__label {
    margin: 0 0 8px;
    padding: 8px 10px 6px;
    font-size: 13px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    color: var(--text-primary);
    border-bottom: 1px solid var(--border);
}

.account-menu__link {
    display: block;
    width: 100%;
    padding: 10px 12px;
    font-size: 14px;
    font-family: "Arial", sans-serif;
    font-weight: 500;
    color: var(--text-secondary);
    text-decoration: none;
    text-align: left;
    border-radius: var(--radius-sm);
    border: none;
    background: transparent;
    cursor: pointer;
    transition:
        color var(--transition),
        background var(--transition);
    box-sizing: border-box;
}

.account-menu__link:hover {
    color: var(--text-primary);
    background: var(--dark-3);
}

.account-menu__link--button {
    margin-top: 4px;
    padding-top: 10px;
    border-top: 1px solid var(--border);
    border-radius: 0 0 var(--radius-sm) var(--radius-sm);
    color: var(--red);
}

.account-menu__link--button:hover {
    color: var(--gold-light);
}

.account-dropdown-enter-active,
.account-dropdown-leave-active {
    transition:
        opacity 0.15s ease,
        transform 0.15s ease;
}

.account-dropdown-enter-from,
.account-dropdown-leave-to {
    opacity: 0;
    transform: translateY(-4px);
}

/* Mobile account block */
.mobile-auth {
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid var(--border);
}

.mobile-auth-title {
    margin: 0 0 10px;
    font-size: 11px;
    font-weight: 700;
    font-family: "Arial", sans-serif;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--text-muted);
}

.mobile-auth-user {
    margin: 0 0 12px;
    font-size: 14px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    color: var(--text-primary);
}

.mobile-auth-link {
    display: block;
    padding: 12px 14px;
    margin-bottom: 4px;
    font-size: 15px;
    font-family: "Arial", sans-serif;
    font-weight: 500;
    color: var(--text-secondary);
    text-decoration: none;
    border-radius: var(--radius-sm);
    border: none;
    width: 100%;
    text-align: left;
    background: var(--dark-3);
    cursor: pointer;
    transition:
        color var(--transition),
        background var(--transition);
    box-sizing: border-box;
}

.mobile-auth-link:hover {
    color: var(--text-primary);
    background: var(--dark-4);
}

.mobile-auth-link--button {
    color: var(--red);
    margin-top: 8px;
}

.mobile-auth-link--button:hover {
    color: var(--gold-light);
}

/* Mobile Menu */
.mobile-menu {
    background: var(--dark-2);
    border-top: 1px solid var(--border);
    padding: 16px;
}

.mobile-search {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--dark-3);
    border: 1px solid var(--border-bright);
    border-radius: var(--radius-sm);
    padding: 0 12px;
    margin-bottom: 12px;
}

.mobile-search-icon {
    width: 16px;
    height: 16px;
    color: var(--text-muted);
    flex-shrink: 0;
}

.mobile-search-input {
    flex: 1;
    background: transparent;
    border: none;
    outline: none;
    color: var(--text-primary);
    font-size: 14px;
    padding: 10px 0;
    font-family: "Arial", sans-serif;
}

.mobile-search-input::placeholder {
    color: var(--text-muted);
}

.mobile-nav-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.mobile-nav-link {
    display: block;
    padding: 10px 12px;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 15px;
    font-family: "Arial", sans-serif;
    border-radius: var(--radius-sm);
    transition:
        color var(--transition),
        background var(--transition);
}

.mobile-nav-link:hover {
    color: var(--text-primary);
    background: var(--dark-3);
}

/* ════════════════════════════════════════════════════════════════════════════
   HERO CAROUSEL
════════════════════════════════════════════════════════════════════════════ */
.hero-carousel {
    position: relative;
    height: 580px;
    overflow: hidden;
    margin-top: 68px;
}

.hero-slides {
    position: relative;
    width: 100%;
    height: 100%;
}

.hero-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.6s ease;
    display: flex;
    align-items: center;
}

.hero-slide--active {
    opacity: 1;
    z-index: 2;
}

/* Hero Background */
.hero-bg {
    position: absolute;
    inset: 0;
}

.hero-noise {
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: 0.4;
}

.hero-lines {
    position: absolute;
    inset: 0;
    background-image: repeating-linear-gradient(
        0deg,
        transparent,
        transparent 39px,
        rgba(255, 255, 255, 0.015) 40px
    );
}

/* Hero Content */
.hero-content {
    position: relative;
    z-index: 4;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 16px;
    opacity: 0;
    transform: translateX(-30px);
    transition:
        opacity 0.5s ease 0.2s,
        transform 0.5s ease 0.2s;
}

.hero-content--visible {
    opacity: 1;
    transform: translateX(0);
}

.hero-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-family: "Arial", sans-serif;
}

.hero-genre-tag {
    background: rgba(200, 21, 42, 0.2);
    border: 1px solid rgba(200, 21, 42, 0.4);
    color: #ff6b7a;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.hero-divider {
    color: var(--text-muted);
}

.hero-chapters {
    color: var(--text-secondary);
    font-size: 12px;
}

.hero-title {
    font-size: clamp(36px, 5vw, 58px);
    font-weight: 900;
    line-height: 1.05;
    letter-spacing: -0.02em;
    color: var(--text-primary);
    margin: 0;
    max-width: 540px;
    font-family: "Georgia", serif;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
}

.hero-desc {
    color: var(--text-secondary);
    font-size: 15px;
    line-height: 1.65;
    max-width: 440px;
    margin: 0;
    font-family: "Arial", sans-serif;
}

.hero-rating {
    display: flex;
    align-items: baseline;
    gap: 4px;
    font-family: "Arial", sans-serif;
}

.star-icon {
    color: var(--gold-light);
    font-size: 18px;
}
.rating-value {
    font-size: 24px;
    font-weight: 800;
    color: var(--text-primary);
}
.rating-label {
    font-size: 14px;
    color: var(--text-muted);
}

.hero-actions {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.btn-read {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: var(--red);
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    font-family: "Arial", sans-serif;
    border-radius: var(--radius-sm);
    letter-spacing: 0.04em;
    transition:
        background var(--transition),
        box-shadow var(--transition),
        transform var(--transition);
    box-shadow: 0 4px 20px var(--red-glow);
}

.btn-read svg {
    width: 16px;
    height: 16px;
}
.btn-read:hover {
    background: var(--red-dark);
    box-shadow: 0 6px 28px rgba(200, 21, 42, 0.5);
    transform: translateY(-1px);
}

.btn-add {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: transparent;
    border: 1px solid var(--border-bright);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    border-radius: var(--radius-sm);
    transition: all var(--transition);
}

.btn-add svg {
    width: 16px;
    height: 16px;
}
.btn-add:hover {
    color: var(--text-primary);
    border-color: var(--text-secondary);
    background: var(--dark-3);
}

/* Hero Artwork */
.hero-artwork {
    position: absolute;
    right: max(5%, calc((100% - 1400px) / 2 + 24px));
    top: 50%;
    transform: translateY(-50%) translateX(60px) scale(0.95);
    opacity: 0;
    transition:
        opacity 0.6s ease 0.3s,
        transform 0.6s ease 0.3s;
    z-index: 3;
}

.hero-artwork--visible {
    opacity: 1;
    transform: translateY(-50%) translateX(0) scale(1);
}

.artwork-frame {
    position: relative;
    z-index: 2;
    border-radius: var(--radius);
    padding: 4px;
    background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.08),
        rgba(255, 255, 255, 0.02)
    );
    box-shadow:
        0 24px 60px rgba(0, 0, 0, 0.8),
        0 0 0 1px rgba(255, 255, 255, 0.06);
}

.artwork-cover {
    width: 200px;
    height: 280px;
    border-radius: calc(var(--radius) - 4px);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.artwork-initial {
    font-size: 80px;
    font-weight: 900;
    color: rgba(255, 255, 255, 0.15);
    font-family: "Georgia", serif;
    user-select: none;
}

.artwork-shine {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.1) 0%,
        transparent 60%
    );
}

.artwork-glow {
    position: absolute;
    inset: -20px;
    filter: blur(40px);
    opacity: 0.25;
    z-index: 1;
    border-radius: 50%;
}

/* Carousel Controls */
.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(14, 14, 14, 0.8);
    border: 1px solid var(--border-bright);
    border-radius: 50%;
    color: var(--text-primary);
    cursor: pointer;
    transition: all var(--transition);
    backdrop-filter: blur(8px);
}

.carousel-btn svg {
    width: 20px;
    height: 20px;
}
.carousel-btn--prev {
    left: 24px;
}
.carousel-btn--next {
    right: 24px;
}
.carousel-btn:hover {
    background: var(--red);
    border-color: var(--red);
    box-shadow: 0 0 16px var(--red-glow);
}

/* Dots */
.carousel-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 10;
}

.carousel-dot {
    width: 24px;
    height: 4px;
    border-radius: 2px;
    background: rgba(255, 255, 255, 0.2);
    cursor: pointer;
    border: none;
    transition: all var(--transition);
}

.carousel-dot--active {
    width: 40px;
    background: var(--red);
    box-shadow: 0 0 8px var(--red-glow);
}

/* Progress Bar */
.hero-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: rgba(255, 255, 255, 0.05);
    z-index: 10;
    overflow: hidden;
}

.hero-progress-bar {
    height: 100%;
    background: var(--red);
    animation: progress 5s linear forwards;
}

@keyframes progress {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}

/* ════════════════════════════════════════════════════════════════════════════
   SHARED SECTION STYLES
════════════════════════════════════════════════════════════════════════════ */
.section {
    padding: 72px 0;
}

.section:nth-child(odd) {
    background: var(--black);
}

.section:nth-child(even) {
    background: var(--dark);
}

.section-inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

.section-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 36px;
    flex-wrap: wrap;
    gap: 16px;
}

.section-title-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.section-eyebrow {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--red);
    font-family: "Arial", sans-serif;
}

.section-title {
    font-size: clamp(22px, 3vw, 32px);
    font-weight: 900;
    letter-spacing: -0.02em;
    color: var(--text-primary);
    margin: 0;
    font-family: "Georgia", serif;
}

.see-all-link {
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 13px;
    font-family: "Arial", sans-serif;
    font-weight: 500;
    transition: color var(--transition);
    white-space: nowrap;
}

.see-all-link:hover {
    color: var(--red);
}

/* ════════════════════════════════════════════════════════════════════════════
   TRENDING SECTION
════════════════════════════════════════════════════════════════════════════ */
.trending-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 10px;
}

.trending-card {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    background: var(--dark-2);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    text-decoration: none;
    transition: all var(--transition);
    position: relative;
    overflow: hidden;
}

.trending-card::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(200, 21, 42, 0.04) 0%,
        transparent 100%
    );
    opacity: 0;
    transition: opacity var(--transition);
}

.trending-card:hover {
    border-color: var(--border-bright);
    transform: translateX(4px);
    box-shadow: -4px 0 0 var(--red);
}

.trending-card:hover::before {
    opacity: 1;
}

.trending-rank {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 800;
    font-family: "Georgia", serif;
    flex-shrink: 0;
    border-radius: 4px;
}

.rank-1 {
    background: linear-gradient(135deg, #d4a017, #f0c040);
    color: #000;
}
.rank-2 {
    background: linear-gradient(135deg, #9aa0a6, #c4c9ce);
    color: #000;
}
.rank-3 {
    background: linear-gradient(135deg, #b5762c, #d4924a);
    color: #fff;
}
.rank-4,
.rank-5,
.rank-6 {
    background: var(--dark-4);
    color: var(--text-secondary);
}

.trending-cover {
    width: 44px;
    height: 58px;
    border-radius: var(--radius-sm);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.4);
    font-family: "Georgia", serif;
}

.trending-info {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.trending-title {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-primary);
    font-family: "Georgia", serif;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
}

.trending-genre {
    font-size: 11px;
    color: var(--text-secondary);
    font-family: "Arial", sans-serif;
}

.trending-stats {
    display: flex;
    gap: 8px;
    align-items: center;
}

.trending-views {
    font-size: 11px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
}

.trending-rating {
    font-size: 11px;
    color: var(--gold-light);
    font-family: "Arial", sans-serif;
}

.trending-chapters {
    font-size: 11px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
    flex-shrink: 0;
}

/* ════════════════════════════════════════════════════════════════════════════
   POPULAR SECTION
════════════════════════════════════════════════════════════════════════════ */
.popular-filters {
    display: flex;
    gap: 4px;
    background: var(--dark-3);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 3px;
}

.filter-btn {
    padding: 6px 14px;
    background: transparent;
    border: none;
    color: var(--text-secondary);
    font-size: 13px;
    font-weight: 500;
    font-family: "Arial", sans-serif;
    border-radius: calc(var(--radius-sm) - 2px);
    cursor: pointer;
    transition: all var(--transition);
}

.filter-btn--active {
    background: var(--red);
    color: white;
    box-shadow: 0 2px 8px var(--red-glow);
}

.filter-btn:not(.filter-btn--active):hover {
    color: var(--text-primary);
    background: var(--dark-4);
}

.popular-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 18px;
}

.popular-card {
    text-decoration: none;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.popular-cover-wrapper {
    position: relative;
    border-radius: var(--radius);
    overflow: hidden;
}

.popular-cover {
    width: 100%;
    aspect-ratio: 2/3;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform var(--transition);
    position: relative;
}

.popular-cover-initial {
    font-size: 52px;
    font-weight: 900;
    color: rgba(255, 255, 255, 0.15);
    font-family: "Georgia", serif;
    user-select: none;
    position: relative;
    z-index: 1;
}

.popular-cover-overlay {
    position: absolute;
    inset: 0;
    background: rgba(200, 21, 42, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--transition);
    z-index: 2;
}

.read-now-text {
    color: white;
    font-size: 13px;
    font-weight: 700;
    font-family: "Arial", sans-serif;
    letter-spacing: 0.06em;
}

.popular-card:hover .popular-cover {
    transform: scale(1.03);
}
.popular-card:hover .popular-cover-overlay {
    opacity: 1;
}

.popular-badge {
    position: absolute;
    top: 8px;
    left: 8px;
    font-size: 9px;
    font-weight: 800;
    padding: 2px 7px;
    border-radius: 3px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    font-family: "Arial", sans-serif;
    z-index: 3;
}

.badge--hot {
    background: var(--red);
    color: white;
}
.badge--top {
    background: var(--gold);
    color: #000;
}
.badge--new {
    background: #1a8b4a;
    color: white;
}

.popular-rank-badge {
    position: absolute;
    bottom: 8px;
    right: 8px;
    width: 24px;
    height: 24px;
    background: rgba(0, 0, 0, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
    color: rgba(255, 255, 255, 0.7);
    font-family: "Arial", sans-serif;
    z-index: 3;
    backdrop-filter: blur(4px);
}

.popular-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
    padding: 0 2px;
}

.popular-title {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-primary);
    font-family: "Georgia", serif;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: color var(--transition);
}

.popular-card:hover .popular-title {
    color: var(--red);
}

.popular-genre {
    font-size: 11px;
    color: var(--text-secondary);
    font-family: "Arial", sans-serif;
}

.popular-meta {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
}

.popular-rating {
    font-size: 12px;
    color: var(--gold-light);
    font-family: "Arial", sans-serif;
}

.popular-status {
    font-size: 10px;
    font-weight: 600;
    padding: 1px 6px;
    border-radius: 3px;
    font-family: "Arial", sans-serif;
    letter-spacing: 0.05em;
}

.status--ongoing {
    background: rgba(26, 139, 74, 0.2);
    color: #4ade80;
    border: 1px solid rgba(26, 139, 74, 0.3);
}
.status--completed {
    background: rgba(100, 100, 200, 0.15);
    color: #a5b4fc;
    border: 1px solid rgba(100, 100, 200, 0.25);
}

.popular-chapters {
    font-size: 11px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
}

.load-more-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.btn-load-more {
    padding: 12px 36px;
    background: transparent;
    border: 1px solid var(--border-bright);
    color: var(--text-secondary);
    font-size: 14px;
    font-weight: 600;
    font-family: "Arial", sans-serif;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all var(--transition);
    letter-spacing: 0.04em;
}

.btn-load-more:hover {
    border-color: var(--red);
    color: var(--text-primary);
    background: rgba(200, 21, 42, 0.08);
}

/* ════════════════════════════════════════════════════════════════════════════
   LATEST UPDATES
════════════════════════════════════════════════════════════════════════════ */
.latest-list {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.latest-item {
    display: grid;
    grid-template-columns: 52px 1fr auto auto;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    background: var(--dark-2);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    text-decoration: none;
    transition: all var(--transition);
}

.latest-item:hover {
    background: var(--dark-3);
    border-color: var(--border-bright);
    transform: translateX(4px);
}

.latest-cover {
    width: 44px;
    height: 58px;
    border-radius: var(--radius-sm);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.35);
    font-family: "Georgia", serif;
}

.latest-info {
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.latest-top {
    display: flex;
    align-items: center;
    gap: 8px;
}

.latest-title {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-primary);
    font-family: "Georgia", serif;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
    transition: color var(--transition);
}

.latest-item:hover .latest-title {
    color: var(--red);
}

.new-badge {
    flex-shrink: 0;
    font-size: 9px;
    font-weight: 800;
    padding: 2px 6px;
    background: var(--red);
    color: white;
    border-radius: 3px;
    letter-spacing: 0.08em;
    font-family: "Arial", sans-serif;
    animation: pulse-new 2s infinite;
}

@keyframes pulse-new {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.latest-genre {
    font-size: 11px;
    color: var(--text-secondary);
    font-family: "Arial", sans-serif;
}

.latest-chapter-info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 3px;
}

.latest-chapter-num {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-primary);
    font-family: "Arial", sans-serif;
    white-space: nowrap;
}

.latest-time {
    font-size: 11px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
    white-space: nowrap;
}

.latest-arrow {
    color: var(--text-muted);
    transition:
        color var(--transition),
        transform var(--transition);
}

.latest-arrow svg {
    width: 16px;
    height: 16px;
}
.latest-item:hover .latest-arrow {
    color: var(--red);
    transform: translateX(3px);
}

/* ════════════════════════════════════════════════════════════════════════════
   GENRE SECTION
════════════════════════════════════════════════════════════════════════════ */
.genre-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 12px;
}

.genre-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 24px 16px;
    background: var(--dark-2);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    text-decoration: none;
    transition: all var(--transition);
    text-align: center;
}

.genre-card:hover {
    background: var(--dark-3);
    border-color: var(--red);
    transform: translateY(-3px);
    box-shadow:
        0 8px 24px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(200, 21, 42, 0.2);
}

.genre-icon {
    font-size: 28px;
}

.genre-name {
    font-size: 15px;
    font-weight: 700;
    color: var(--text-primary);
    font-family: "Georgia", serif;
    transition: color var(--transition);
}

.genre-card:hover .genre-name {
    color: var(--red);
}

.genre-count {
    font-size: 11px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
}

/* ════════════════════════════════════════════════════════════════════════════
   FOOTER
════════════════════════════════════════════════════════════════════════════ */
.footer {
    background: var(--dark);
    border-top: 1px solid var(--border);
    padding: 64px 0 0;
}

.footer-inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
}

.footer-top {
    display: grid;
    grid-template-columns: 340px 1fr;
    gap: 60px;
    padding-bottom: 48px;
    border-bottom: 1px solid var(--border);
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
}

.footer-tagline {
    font-size: 14px;
    line-height: 1.7;
    color: var(--text-secondary);
    font-family: "Arial", sans-serif;
    margin: 0 0 24px;
}

.footer-socials {
    display: flex;
    gap: 8px;
}

.social-btn {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--dark-3);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    color: var(--text-secondary);
    text-decoration: none;
    transition: all var(--transition);
}

.social-btn svg {
    width: 16px;
    height: 16px;
}
.social-btn:hover {
    background: var(--red);
    border-color: var(--red);
    color: white;
    transform: translateY(-2px);
}

.footer-nav-columns {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

.footer-col-title {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-secondary);
    font-family: "Arial", sans-serif;
    margin: 0 0 16px;
}

.footer-col ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.footer-link {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 13px;
    font-family: "Arial", sans-serif;
    transition: color var(--transition);
}

.footer-link:hover {
    color: var(--text-primary);
}

.footer-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 0;
    flex-wrap: wrap;
    gap: 12px;
}

.footer-copyright {
    font-size: 12px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
    margin: 0;
}

.footer-bottom-links {
    display: flex;
    gap: 16px;
}

.footer-bottom-link {
    font-size: 12px;
    color: var(--text-muted);
    font-family: "Arial", sans-serif;
    text-decoration: none;
    transition: color var(--transition);
}

.footer-bottom-link:hover {
    color: var(--text-primary);
}

/* ════════════════════════════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════════════════════════════ */
@media (max-width: 1100px) {
    .hero-artwork {
        right: 5%;
    }
    .artwork-cover {
        width: 170px;
        height: 238px;
    }
    .footer-top {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .footer-nav-columns {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
}

@media (max-width: 900px) {
    .navbar__links {
        display: none;
    }
    .hamburger {
        display: flex;
    }
    .hero-carousel {
        height: 500px;
    }
    .hero-artwork {
        display: none;
    }
    .hero-title {
        font-size: 32px;
    }
    .trending-grid {
        grid-template-columns: 1fr;
    }
    .popular-grid {
        grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    }
    .btn-nav-cta {
        display: none;
    }
}

@media (max-width: 640px) {
    .hero-carousel {
        height: 480px;
    }
    .section {
        padding: 48px 0;
    }
    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }
    .footer-nav-columns {
        grid-template-columns: repeat(2, 1fr);
    }
    .latest-item {
        grid-template-columns: 44px 1fr auto;
        grid-template-rows: auto auto;
    }
    .latest-arrow {
        display: none;
    }
    .popular-grid {
        grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
        gap: 12px;
    }
}
</style>
