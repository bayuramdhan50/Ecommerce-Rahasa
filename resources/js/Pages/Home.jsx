import { Head } from '@inertiajs/react';
import { Link } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';

export default function Home({ auth, featuredProducts, categories }) {
    return (
        <AppLayout user={auth?.user}>
            <Head title="Rahasa - Belanja Online Terpercaya" />
            
            {/* Hero Section dengan Background Image */}
            <div className="relative bg-white">
                <div className="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-90"></div>
                <div className="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <div className="text-center text-white">
                        <h1 className="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                            Selamat Datang di Rahasa
                        </h1>
                        <p className="mt-6 text-xl max-w-2xl mx-auto">
                            Temukan berbagai produk berkualitas dengan harga terbaik. Belanja lebih mudah dan aman.
                        </p>
                        <div className="mt-10">
                            <Link
                                href="/products"
                                className="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-gray-50 transition-all"
                            >
                                Mulai Belanja
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            {/* Features Section */}
            <div className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div className="text-center">
                            <div className="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white mx-auto">
                                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 className="mt-4 text-lg font-medium text-gray-900">Pengiriman Cepat</h3>
                            <p className="mt-2 text-sm text-gray-500">
                                Pengiriman ke seluruh Indonesia dengan estimasi waktu yang akurat
                            </p>
                        </div>
                        <div className="text-center">
                            <div className="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white mx-auto">
                                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 className="mt-4 text-lg font-medium text-gray-900">Pembayaran Aman</h3>
                            <p className="mt-2 text-sm text-gray-500">
                                Berbagai metode pembayaran yang aman dan terpercaya
                            </p>
                        </div>
                        <div className="text-center">
                            <div className="flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white mx-auto">
                                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <h3 className="mt-4 text-lg font-medium text-gray-900">Harga Terbaik</h3>
                            <p className="mt-2 text-sm text-gray-500">
                                Dapatkan harga terbaik dan berbagai promo menarik
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {/* Categories Section */}
            <div className="py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center">
                        <h2 className="text-3xl font-extrabold tracking-tight text-gray-900">
                            Kategori Produk
                        </h2>
                        <p className="mt-4 max-w-2xl mx-auto text-gray-500">
                            Temukan berbagai kategori produk yang sesuai dengan kebutuhan Anda
                        </p>
                    </div>
                    <div className="mt-12 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                        {categories?.map((category) => (
                            <Link 
                                key={category.id}
                                href={`/categories/${category.id}`}
                                className="group relative"
                            >
                                <div className="relative w-full h-40 bg-white rounded-lg overflow-hidden shadow-sm transition-all group-hover:shadow-md">
                                    <img
                                        src={category.image_url || '/img/placeholder.jpg'}
                                        alt={category.name}
                                        className="w-full h-full object-center object-cover group-hover:opacity-75 transition-opacity"
                                    />
                                    <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div className="absolute bottom-0 left-0 right-0 p-4">
                                        <h3 className="text-sm font-medium text-white text-center">
                                            {category.name}
                                        </h3>
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>
                </div>
            </div>

            {/* Featured Products Section */}
            <div className="bg-gray-50 py-16">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center">
                        <h2 className="text-3xl font-extrabold tracking-tight text-gray-900">
                            Produk Unggulan
                        </h2>
                        <p className="mt-4 max-w-2xl mx-auto text-gray-500">
                            Produk pilihan dengan kualitas terbaik dan harga terjangkau
                        </p>
                    </div>
                    <div className="mt-12 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                        {featuredProducts?.map((product) => (
                            <Link 
                                key={product.id}
                                href={`/products/${product.id}`}
                                className="group"
                            >
                                <div className="relative w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden bg-gray-200 group-hover:opacity-75 transition-opacity">
                                    <img
                                        src={product.image_url || '/img/placeholder.jpg'}
                                        alt={product.name}
                                        className="w-full h-full object-center object-cover"
                                    />
                                    {product.discount > 0 && (
                                        <div className="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-medium">
                                            -{product.discount}%
                                        </div>
                                    )}
                                </div>
                                <div className="mt-4">
                                    <h3 className="text-sm font-medium text-gray-900">
                                        {product.name}
                                    </h3>
                                    <p className="mt-1 text-sm text-gray-500">{product.category?.name}</p>
                                    <div className="mt-2 flex items-center justify-between">
                                        <div>
                                            {product.discount > 0 ? (
                                                <>
                                                    <span className="text-sm text-gray-500 line-through">
                                                        Rp {new Intl.NumberFormat('id-ID').format(product.original_price)}
                                                    </span>
                                                    <span className="ml-2 text-sm font-medium text-gray-900">
                                                        Rp {new Intl.NumberFormat('id-ID').format(product.price)}
                                                    </span>
                                                </>
                                            ) : (
                                                <span className="text-sm font-medium text-gray-900">
                                                    Rp {new Intl.NumberFormat('id-ID').format(product.price)}
                                                </span>
                                            )}
                                        </div>
                                        <div className="text-sm text-gray-500">
                                            {product.rating} ⭐
                                        </div>
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>
                    <div className="mt-12 text-center">
                        <Link
                            href="/products"
                            className="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors"
                        >
                            Lihat Semua Produk
                        </Link>
                    </div>
                </div>
            </div>

            {/* CTA Section */}
            <div className="bg-blue-700">
                <div className="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 className="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        <span className="block">Siap untuk berbelanja?</span>
                        <span className="block text-blue-200">Bergabunglah dengan Rahasa sekarang.</span>
                    </h2>
                    <div className="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div className="inline-flex rounded-md shadow">
                            <Link
                                href="/register"
                                className="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50"
                            >
                                Daftar Sekarang
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
