import Link from "next/link";
import React from "react";

export default function Layout({ children }: { children: React.ReactNode }) {
    return (
        <div className="min-h-screen bg-gradient-to-br via-black to-purple-950 text-white font-sans">
            {/* Glassmorphic Navbar */}
            <nav className="bg-transparent backdrop-blur-none border-b border-white/10 shadow-none">
                <div className="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
                    <h1 className="text-xl md:text-2xl font-extrabold bg-gradient-to-r from-purple-400 to-pink-500 text-transparent bg-clip-text drop-shadow">
                        Project Cost Estimator
                    </h1>

                    <div className="flex items-center space-x-6 text-sm md:text-base font-medium">
                        <Link href="/" className="hover:text-purple-300 transition duration-150">
                            Projects
                        </Link>
                        <Link href="/add" className="hover:text-purple-300 transition duration-150">
                            Add Project
                        </Link>
                        <Link href="/simulate" className="hover:text-purple-300 transition duration-150">
                            Simulate Payment
                        </Link>
                    </div>
                </div>
            </nav>

            {/* Page Content */}
            <main className="max-w-6xl mx-auto px-6 py-10">{children}</main>
        </div>
    );
}
