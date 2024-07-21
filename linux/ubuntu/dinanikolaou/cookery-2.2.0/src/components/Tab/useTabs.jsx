import { useRef, useState, useEffect, useMemo, useCallback } from 'react';

function useTabs(initialTabs, initialActiveTab = 0, onChange) {
  const tabsRef = useRef(initialTabs);
  const [activeTab, setActiveTab] = useState(initialActiveTab);

  const handleTabClick = useCallback(
    (index) => {
      if (index !== activeTab) {
        setActiveTab(index);
        const newHash = tabsRef.current[index].title.toLowerCase().replace(/ /g, "-");
        if (onChange) {
          onChange(tabsRef.current[index].title);
        }
        if (typeof window !== 'undefined') {
          window.location.hash = newHash;
        }
      }
    },
    [activeTab, onChange]
  );

  const checkHash = useCallback(() => {
    if (typeof window !== 'undefined') {
      const hash = window.location.hash.substring(1);
      const tabIndex = tabsRef.current.findIndex(
        (tab) => tab.title.toLowerCase().replace(/ /g, "-") === hash
      );
      if (tabIndex !== -1 && tabIndex !== activeTab) {
        setActiveTab(tabIndex);
        if (onChange) {
          onChange(tabsRef.current[tabIndex].title);
        }
      }
    }
  }, [activeTab, onChange]);

  useEffect(() => {
    if (typeof window !== 'undefined') {
      checkHash();
      window.addEventListener('hashchange', checkHash);
      return () => {
        window.removeEventListener('hashchange', checkHash);
      };
    }
  }, [checkHash]);

  const renderTabs = useMemo(
    () => () => {
      return tabsRef.current.map((tab, index) => (
        <button
          key={index}
          onClick={() => handleTabClick(index)}
          className={activeTab === index ? 'active-tab' : ''}
        >
          {tab.icon}
          {tab.title}
        </button>
      ));
    },
    [handleTabClick, activeTab]
  );

  const renderContent = useMemo(
    () => () => {
      return tabsRef.current[activeTab].content;
    },
    [activeTab]
  );

  return { renderTabs, renderContent };
}

export default useTabs;
