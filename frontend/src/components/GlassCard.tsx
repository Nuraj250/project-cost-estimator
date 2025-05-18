import React from 'react';

interface GlassCardProps {
  children: React.ReactNode;
  className?: string;
}

const GlassCard: React.FC<GlassCardProps> = ({ children, className = '' }) => {
  return (
    <div
      className={`bg-white/10 border border-white/30 backdrop-blur-md shadow-md rounded-xl p-6 ${className}`}
    >
      {children}
    </div>
  );
};

export default GlassCard;
