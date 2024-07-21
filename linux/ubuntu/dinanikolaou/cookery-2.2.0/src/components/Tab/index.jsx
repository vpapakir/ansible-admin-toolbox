import useTabs from "./useTabs";
import { TabHeader } from "..";
import { logo} from "../../components/images";
import { __ } from '@wordpress/i18n';

const Tab = ({ tabsData, onChange, activeTabTitle }) => {
  const { renderTabs, renderContent } = useTabs(tabsData, 0, onChange);

  return (
    <div className="cw-tabs-container">
      <div className="cw-tabs">
        <div className="wrapper">
          <div className="top">
            <div className="logo">
              <img src={logo} alt="logo" />
            </div>
            <div className="cw-tabs-button">
              {renderTabs()}
            </div>
          </div>

        </div>

      </div>
      <div className="wrapper">
        <TabHeader title={activeTabTitle} />
        <div className="cw-tabs-content">
          {renderContent()}
        </div>
      </div>
    </div>
  );
};

export default Tab;