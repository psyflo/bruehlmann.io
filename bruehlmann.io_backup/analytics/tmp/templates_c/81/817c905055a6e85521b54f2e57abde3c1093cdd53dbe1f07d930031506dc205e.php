<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @CoreUpdater/_updateCommunicationEmail.twig */
class __TwigTemplate_a1be034da40591f01932c14e6d1d9b83122371feb7fa7f76d8c86352f10dd6cd extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<p>";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["ScheduledReports_EmailHello"]), "html", null, true);
        echo "</p>

<p>";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ThereIsNewVersionAvailableForUpdate"]), "html", null, true);
        echo "</p>

<p>";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_YouCanUpgradeAutomaticallyOrDownloadPackage", (isset($context["latestVersion"]) ? $context["latestVersion"] : $this->getContext($context, "latestVersion"))]), "html", null, true);
        echo "<br/>
<a href=\"";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : $this->getContext($context, "host")), "html_attr");
        echo "index.php?module=CoreUpdater&action=newVersionAvailable\">";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : $this->getContext($context, "host")), "html", null, true);
        echo "index.php?module=CoreUpdater&action=newVersionAvailable</a>
</p>

";
        // line 9
        if ((isset($context["isStableVersion"]) ? $context["isStableVersion"] : $this->getContext($context, "isStableVersion"))) {
            // line 10
            echo "<p>
    ";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ViewVersionChangelog"]), "html", null, true);
            echo "
    <br/>
    <a href=\"";
            // line 13
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('safelink')->getCallable(), [(isset($context["linkToChangeLog"]) ? $context["linkToChangeLog"] : $this->getContext($context, "linkToChangeLog"))]), "html_attr");
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["linkToChangeLog"]) ? $context["linkToChangeLog"] : $this->getContext($context, "linkToChangeLog")), "html", null, true);
            echo "</a>
</p>
";
        }
        // line 16
        echo "
<p>";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ReceiveEmailBecauseIsSuperUser", (isset($context["host"]) ? $context["host"] : $this->getContext($context, "host"))]), "html", null, true);
        echo "</p>
<p>";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_FeedbackRequest"]), "html", null, true);
        echo "<br/><a href=\"https://matomo.org/contact/\">https://matomo.org/contact/</a></p>
";
    }

    public function getTemplateName()
    {
        return "@CoreUpdater/_updateCommunicationEmail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 18,  74 => 17,  71 => 16,  63 => 13,  58 => 11,  55 => 10,  53 => 9,  45 => 6,  41 => 5,  36 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<p>{{ 'ScheduledReports_EmailHello'|translate }}</p>

<p>{{ 'CoreUpdater_ThereIsNewVersionAvailableForUpdate'|translate }}</p>

<p>{{ 'CoreUpdater_YouCanUpgradeAutomaticallyOrDownloadPackage'|translate(latestVersion) }}<br/>
<a href=\"{{ host|e('html_attr') }}index.php?module=CoreUpdater&action=newVersionAvailable\">{{ host }}index.php?module=CoreUpdater&action=newVersionAvailable</a>
</p>

{% if isStableVersion %}
<p>
    {{ 'CoreUpdater_ViewVersionChangelog'|translate }}
    <br/>
    <a href=\"{{ linkToChangeLog|safelink|e('html_attr') }}\">{{ linkToChangeLog }}</a>
</p>
{% endif %}

<p>{{ 'CoreUpdater_ReceiveEmailBecauseIsSuperUser'|translate(host) }}</p>
<p>{{ 'CoreUpdater_FeedbackRequest'|translate }}<br/><a href=\"https://matomo.org/contact/\">https://matomo.org/contact/</a></p>
", "@CoreUpdater/_updateCommunicationEmail.twig", "/var/www/analytics/plugins/CoreUpdater/templates/_updateCommunicationEmail.twig");
    }
}
